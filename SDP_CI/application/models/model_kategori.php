<?php
    class model_kategori extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function insert($nama){
            $this->db->insert('kategori',array(
                'NAMA_KATEGORI' => $nama
            ));
        }
        public function delete($id){
            $this->db->delete('kategori',array(
                'ID_KATEGORI' => $id
            ));
        }
        public function update($id,$name){
            $this->db->where('ID_KATEGORI',$id);
            $this->db->update('kategori',array(
                'NAMA_KATEGORI' => $name
            ));
        }
        public function getlastID(){
            $this->db->select_max('ID_KATEGORI');
            return $this->db->get('kategori')->row();
        }
        public function fetch_all(){
            return $this->db->get('kategori')->result();
        }
        public function get($id){
            return $this->db->where('ID_KATEGORI',$id)->get('kategori')->row();
        }
    }

?>