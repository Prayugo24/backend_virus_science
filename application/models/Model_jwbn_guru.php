<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jwbn_guru extends CI_Model {

	public function get_jwbnGuru($nip){
    $this->db->order_by('id_jawaban', 'desc');
    $this->db->select('tb_jawaban.id_jawaban, tb_jawaban.jawaban,tb_pertanyaan.pertanyaan,tb_pertanyaan.id_pertanyaan,tb_pertanyaan.status, tb_siswa.nama as nama_siswa,guru.nama as nama_guru,tb_siswa.nis,guru.nip');
    $this->db->from('tb_jawaban');
    $this->db->join('tb_siswa',' tb_jawaban.nis=tb_siswa.nis');
    $this->db->join('guru',' tb_jawaban.nip=guru.nip');
    $this->db->join('tb_pertanyaan',' tb_jawaban.id_pertanyaan=tb_pertanyaan.id_pertanyaan');
    $this->db->where('tb_jawaban.nip',$nip);
    $query = $this->db->get();
    return $query;
  }

  public function get_jwbnWhereNis($nis){
    $this->db->order_by('id_jawaban', 'desc');
    $this->db->select('tb_jawaban.id_jawaban, tb_jawaban.jawaban,tb_pertanyaan.pertanyaan,tb_pertanyaan.id_pertanyaan,tb_pertanyaan.status, tb_siswa.nama as nama_siswa,guru.nama as nama_guru,tb_siswa.nis,guru.nip');
    $this->db->from('tb_jawaban');
    $this->db->join('tb_siswa',"tb_jawaban.nis=tb_siswa.nis");
    $this->db->join('guru',' tb_jawaban.nip=guru.nip');
    $this->db->join('tb_pertanyaan',' tb_jawaban.id_pertanyaan=tb_pertanyaan.id_pertanyaan');
    $this->db->where('tb_jawaban.nis',$nis);
    
    $query = $this->db->get();
    return $query;
  }
  public function get_idPertanyaanJawaban($id_pertanyaan){
    $this->db->select('id_jawaban');
    $this->db->from('tb_jawaban');
    $this->db->where('id_pertanyaan',$id_pertanyaan);
    $query = $this->db->get();
    return $query;
	}

function code_jwbnGuru(){
    $this->db->select('RIGHT(tb_jawaban.id_jawaban,3) as kode',false );
    $this->db->order_by('id_jawaban','DESC');
    $this->db->limit(1);
      $query=$this->db->get('tb_jawaban');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 2 menunjukan jumlah angka digit 0
      $kodeJadi="2110".$kodeMax;
      return $kodeJadi;
    }
    

   public function insert($data)
  {
      $this->db->insert('tb_jawaban',$data);
      return TRUE;
  }
  

    public function update($data,$kondisi)
  {
      $this->db->update('tb_jawaban',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('tb_jawaban');
      return TRUE;
  }

}
