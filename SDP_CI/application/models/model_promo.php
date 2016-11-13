<?php
    class model_promo extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function fetch_all(){
            return $this->db->get_where('promo',array(
                'STATUS_PROMO' => 1
            ))->result();
        }
        public function delete($id){
            $this->db->where('ID_PROMO',$id);
            $this->db->update('promo',array(
                'STATUS_PROMO' => 0
            ));
        }
        public function update($id,$nama,$deskripsi,$potharga,$idmenu){
            $this->db->where('ID_PROMO',$id)->update('promo',array(
                'NAMA_PROMO' => $nama,
                'DESKRIPSI_PROMO' => $deskripsi,
                'POTONGAN_HARGA' => $potharga,
                'ID_MENU' => $idmenu
            ));
        }
        public function getNewData(){
            $tambahan = new stdClass();
            $tambahan->ID_PROMO = $this->getlastID()->ID_PROMO+1;
            $tambahan->NAMA_PROMO = "";
            $tambahan->DESKRIPSI_PROMO = "";
            $tambahan->POTONGAN_HARGA= "";
            $tambahan->ID_MENU= "";
            $tambahan->STATUS_PROMO= 1;
            return $tambahan;
        }
        public function insert($nama,$harga,$deskripsi,$idmenu){
            $this->db->insert('promo',array(
                'NAMA_PROMO' => $nama,
                'DESKRIPSI_PROMO' => $deskripsi,
                'POTONGAN_HARGA' => $harga,
                'ID_MENU' => $idmenu,
                'STATUS_PROMO' => 1
            ));
        }
        public function getlastID(){
            $this->db->select_max('ID_PROMO');
            return $this->db->get('promo')->row();
        }
        public function get($id){
            return $this->db->where('ID_PROMO',$id)->get('promo')->row();
        }
    }

?>