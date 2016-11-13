<?php
    class model_customer extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function delete($id){
            $this->db->where('ID_CUSTOMER',$id);
			$this->db->update('customer',array(
				'STATUS_CUSTOMER' => 0
			));
        }
        public function verification($user,$authkey){
            $this->db->select('AUTH_KEY');
            $this->db->where('USERNAME_CUSTOMER',$user);
            $hasil = $this->db->get('customer')->row();
            if($hasil->AUTH_KEY == $authkey){
                $this->db->where('USERNAME_CUSTOMER',$user);
                $this->db->update('customer',array(
                    'STATUS_CUSTOMER' => 1
                ));
                redirect('dashboard/viewSuccessVerification','refresh');
            }
        }
        public function register($user,$pass,$email,$nama,$alamat,$kota,$notelp){
            $key = "nasiayamgoreng";
            $pass = crypt(md5($pass),$key);
            $auth = crypt(md5($user),$key);
            $this->load->model('model_email');
            $this->model_email->sendEmail($email,$user,$auth);

            $this->db->insert('customer',array(
                'USERNAME_CUSTOMER' => $user,
                'PASSWORD_CUSTOMER' => $pass,
                'EMAIL_CUSTOMER' => $email,
                'AUTH_KEY' => $auth,
                'NAMA_CUSTOMER' => $nama,
                'ALAMAT_CUSTOMER' => $alamat,
                'KOTA_CUSTOMER' => $kota,
                'NO_TELP_CUSTOMER' => $notelp,
                'STATUS_CUSTOMER' => 0
            ));
        }
        public function update($id,$name,$alamat,$kota,$notelp){
            $this->db->where('ID_CUSTOMER',$id);
            $this->db->update('customer',array(
                'NAMA_CUSTOMER' => $name,
                'ALAMAT_CUSTOMER' => $alamat,
                'KOTA_CUSTOMER' => $kota,
                'NO_TELP_CUSTOMER' => $notelp
            ));
        }
        public function fetch_all(){
            return $this->db->get_where('customer',array('STATUS_CUSTOMER'=>1))->result();
        }
        public function get($id){
            return $this->db->where('ID_CUSTOMER',$id)->get('customer')->row();
        }
    }

?>