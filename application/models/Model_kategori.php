<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function get_kategori(){
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get('tb_kategori');
		return $query;
	}

  public function input_kategori($data, $table){
    $this->db->insert($table, $data);
  }


   function delete_kategori($id_kategori){
        $hasil=$this->db->query("DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
        return $hasil;
    }
      

  function update_kategori($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}
