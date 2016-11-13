<?php
    class model_menu extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function fetch_all(){
            return $this->db->get_where('menu',array(
                'STATUS_MENU' => 1
            ))->result();
        }
        public function delete($id){
            $this->db->where('ID_MENU',$id);
            $this->db->update('menu',array(
                'STATUS_MENU' => 0
            ));
        }
        public function update($id,$idkat,$nama,$harga,$deskripsi){
            $this->db->where('ID_MENU',$id)->update('menu',array(
                'ID_KATEGORI' => $idkat,
                'NAMA_MENU' => $nama,
                'HARGA' => $harga,
                'DESKRIPSI' => $deskripsi
            ));
        }
        public function getNewData(){
            $tambahan = new stdClass();
            $tambahan->ID_MENU = $this->getlastID()->ID_MENU+1;
            $tambahan->NAMA_MENU = "";
            $tambahan->ID_KATEGORI = "";
            $tambahan->HARGA= "";
            $tambahan->STATUS_MENU= "";
            $tambahan->DESKRIPSI= "";
            return $tambahan;
        }
        public function insert($id_kat,$nama,$harga,$deskripsi){
            $this->db->insert('menu',array(
                'ID_KATEGORI' => $id_kat,
                'NAMA_MENU' => $nama,
                'HARGA' => $harga,
                'DESKRIPSI' => $deskripsi,
                'STATUS_MENU' => 1
            ));
        }
        public function getlastID(){
            $this->db->select_max('ID_MENU');
            return $this->db->get('menu')->row();
        }
        public function get($id){
            return $this->db->where('ID_MENU',$id)->get('menu')->row();
        }
    }

?>