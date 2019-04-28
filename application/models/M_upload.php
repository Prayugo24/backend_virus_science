<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model {


public function save($nama_file, $ukuran_file)
 {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows()==1){
      $data = array(
       	'gambar'=> $nama_file,
		'ukuran'=>$ukuran_file 
     );
      $this->db->where('id_user', $this->session->userdata('user_id'));
      $this->db->update('tb_user', $data); 
      return "true";
    }else{
      return "false";
    }
  
}

public function cari()
 {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result();
    }else{
      return false;
    }
  
}
	

}

/* End of file M_daftar.php */
/* Location: ./application/models/M_daftar.php */