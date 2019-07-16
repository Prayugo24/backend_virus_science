<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_prtnya_s extends CI_Model {

	public function get_pertanyaanS($nip){
		$this->db->order_by('id_pertanyaan', 'desc');
    $this->db->select('tb_pertanyaan.id_pertanyaan, tb_pertanyaan.pertanyaan,tb_pertanyaan.status, tb_siswa.nama as nama_siswa,guru.nama as nama_guru,tb_siswa.nis,guru.nip');
    $this->db->from('tb_pertanyaan');
    $this->db->join('tb_siswa',' tb_pertanyaan.nis=tb_siswa.nis');
    $this->db->join('guru',' tb_pertanyaan.nip=guru.nip');
    $this->db->where('tb_pertanyaan.nip',$nip);
    $query = $this->db->get();
    return $query;
	}

  

function code_pertanyaanS(){
    $this->db->select('RIGHT(tb_pertanyaan.id_pertanyaan,3) as kode',false );
    $this->db->order_by('id_pertanyaan','DESC');
    $this->db->limit(1);
      $query=$this->db->get('tb_pertanyaan');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 2 menunjukan jumlah angka digit 0
      $kodeJadi="103".$kodeMax;
      return $kodeJadi;
    }
    

   public function insert($data)
  {
      $this->db->insert('tb_pertanyaan',$data);
      return TRUE;
  }


    public function update($data,$kondisi)
  {
      $this->db->update('tb_pertanyaan',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('tb_pertanyaan');
      return TRUE;
  }

}
