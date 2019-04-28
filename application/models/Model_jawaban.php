<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jawaban extends CI_Model {

	public function get_jawaban(){
		$this->db->order_by('kode_jawaban', 'desc');
		$query = $this->db->get('pilihan_jawaban');
		return $query;
	}

  public function get_jawabanId($id_soal){
    $this->db->order_by('rand()');
    $this->db->select('*');
    $this->db->from('pilihan_jawaban');
    $this->db->where('id_soal',$id_soal);
    $query=$this->db->get();
    return $query;
  }
  public function getCountIdSoal($where="")
	{
		$data = $this->db->query('select count(id_soal) AS total_id from pilihan_jawaban '.$where);
		return $data;
	}

  public function getjawabanId($kode_jawaban){
    $this->db->select('*');
    $this->db->from('pilihan_jawaban');
    $this->db->where('kode_jawaban',$kode_jawaban);
    $query=$this->db->get();
    return $query->result();
  }


  public function get_soal(){
    $query = $this->db->get('soal');
    return $query;
  }

  public function total_jawaban(){
    $query = $this->db->query("select * from pilihan_jawaban");
    $total = $query->num_rows();
    return $total;
  }

   public function getAllJawaban(){
    $this->db->order_by('kode_jawaban', 'desc');
    $this->db->select('pilihan_jawaban.kode_jawaban, pilihan_jawaban.jawaban, soal.id_soal, soal.soal, pilihan_jawaban.koreksi');
    $this->db->from('pilihan_jawaban');
    $this->db->join('soal','pilihan_jawaban.id_soal=soal.id_soal');
    $query = $this->db->get();
    return $query;
  }

  public function edit_jawaban($kode_jawaban){
    $this->db->select('pilihan_jawaban.kode_jawaban, pilihan_jawaban.jawaban, pilihan_jawaban.koreksi, soal.id_soal, soal.soal');
    $this->db->from('pilihan_jawaban');
    $this->db->join('soal','soal.id_soal=pilihan_jawaban.id_soal');
    $this->db->where('kode_jawaban',$kode_jawaban);
    $query = $this->db->get();
    return $query->result();
  }

//lolll
  // SELECT soal.id_soal, soal.soal, soal.gambar, soal.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori, pilihan_jawaban.kode_jawaban, pilihan_jawaban.jawaban, pilihan_jawaban.koreksi, pilihan_jawaban.id_soal, tb_point.id_point, tb_point.point, tb_point.waktu, tb_point.id_kategori FROM soal, tb_kategori, tb_point, pilihan_jawaban WHERE soal.id_soal = pilihan_jawaban.id_soal AND tb_kategori.id_kategori = soal.id_kategori AND tb_kategori.id_kategori = tb_point.id_kategori

  public function getapi(){
    $this->db->select('soal.id_soal, soal.soal, soal.gambar, soal.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori, pilihan_jawaban.kode_jawaban, pilihan_jawaban.jawaban, pilihan_jawaban.koreksi, pilihan_jawaban.id_soal, tb_point.id_point, tb_point.point, tb_point.waktu, tb_point.id_kategori');
    $this->db->from('soal');
    $this->db->join('tb_kategori','tb_kategori.id_kategori = soal.id_kategori');
    $this->db->join('pilihan_jawaban','pilihan_jawaban.id_soal = soal.id_soal');
    $this->db->join('tb_point','tb_point.id_kategori = tb_kategori.id_kategori');
    $query = $this->db->get();
    return $query;
  }


function code_jawaban(){
    $this->db->select('RIGHT(pilihan_jawaban.kode_jawaban,3) as kode',false );
    $this->db->order_by('kode_jawaban','DESC');
    $this->db->limit(1);
      $query=$this->db->get('pilihan_jawaban');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 3 menunjukan jumlah angka digit 0
      $kodeJadi="Jwb-".$kodeMax;
      return $kodeJadi;
    }

  //  public function insert($data)
  // {
  //     $this->db->insert('pilihan_jawaban',$data);
  //     return TRUE;
  // }


  //   public function update($data,$kondisi)
  // {
  //     $this->db->update('pilihan_jawaban',$data,$kondisi);
  //     return TRUE;
  // }

  // public function delete($where)
  // {
  //     $this->db->where($where);
  //     $this->db->delete('pilihan_jawaban');
  //     return TRUE;
  // }

  public function input_jawaban($data, $table){
    $this->db->insert($table, $data);
  }


   function delete_jawaban($kode_jawaban){
        $hasil=$this->db->query("DELETE FROM pilihan_jawaban WHERE kode_jawaban='$kode_jawaban'");
        return $hasil;
    }
      

  function update_jawaban($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}
