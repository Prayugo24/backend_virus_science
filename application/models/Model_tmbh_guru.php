
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tmbh_guru extends CI_Model {

	public function get_guru(){
		$this->db->order_by('id_guru', 'desc');
		$query = $this->db->get('guru');
		return $query;
  }
  public function get_guruNip($nama){
    $this->db->order_by('id_guru', 'desc');
    $this->db->select("nip");
    $this->db->where("nama",$nama);
		$query = $this->db->get('guru');
		return $query;
	}

 

  public function get_kategori(){
    $query = $this->db->get('tb_kategori');
    return $query;
  }


function code_guru(){
    $this->db->select('RIGHT(soal.id_soal,3) as kode',false );
    $this->db->order_by('id_soal','DESC');
    $this->db->limit(1);
      $query=$this->db->get('soal');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 2 menunjukan jumlah angka digit 0
      $kodeJadi="So-".$kodeMax;
      return $kodeJadi;
    }
    

   public function insert($data)
  {
      $this->db->insert('guru',$data);
      return TRUE;
  }
 

    public function update($data,$kondisi)
  {
      $this->db->update('guru',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('guru');
      return TRUE;
  }

}
