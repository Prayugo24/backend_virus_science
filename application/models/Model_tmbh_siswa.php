
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tmbh_siswa extends CI_Model {

	public function get_siswa(){
		$this->db->order_by('id_siswa', 'desc');
		$query = $this->db->get('tb_siswa');
		return $query;
  }
 

  

function code_guru(){
    $this->db->select('RIGHT(tb_siswa.id_siswa,3) as kode',false );
    $this->db->order_by('id_siswa','DESC');
    $this->db->limit(1);
      $query=$this->db->get('tb_siswa');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 2 menunjukan jumlah angka digit 0
      $kodeJadi="0030".$kodeMax;
      return $kodeJadi;
    }
    

   public function insert($data)
  {
      $this->db->insert('tb_siswa',$data);
      return TRUE;
  }
 

    public function update($data,$kondisi)
  {
      $this->db->update('tb_siswa',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('tb_siswa');
      return TRUE;
  }

}
