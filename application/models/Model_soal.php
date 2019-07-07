<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_soal extends CI_Model {

	public function get_soal(){
		$this->db->order_by('id_soal', 'desc');
		$query = $this->db->get('soal');
		return $query;
	}

  public function get_soalRand(){
    $this->db->order_by('rand()');
    //$this->db->limit(3);
    $query = $this->db->get('soal');
    return $query;
  }

  public function get_kategori(){
    $query = $this->db->get('tb_kategori');
    return $query;
  }

  public function total_soal(){
    $query = $this->db->query("select * from soal");
    $total = $query->num_rows();
    return $total;
  }
  public function selectLimiter(){
    $query = $this->db->get('tbl_limiter');
    return $query;
  }


  // SELECT soal.id_soal, soal.soal, soal.gambar, soal.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori FROM soal, tb_kategori WHERE soal.id_kategori=tb_kategori.id_kategori
  public function getAllSoal(){
    $this->db->order_by('id_soal', 'desc');
    $this->db->select('soal.id_soal, soal.soal, soal.gambar, soal.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('soal');
    $this->db->join('tb_kategori','soal.id_kategori=tb_kategori.id_kategori');
    $query = $this->db->get();
    return $query;
  }
  

  public function edit($id_soal){
    $this->db->order_by('id_soal', 'desc');
    $this->db->select('soal.id_soal, soal.soal, soal.gambar, soal.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('soal');
    $this->db->join('tb_kategori','soal.id_kategori=tb_kategori.id_kategori');
    $this->db->where('id_soal',$id_soal);
    $query = $this->db->get();
    return $query->result();
  }

function code_soal(){
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
      $this->db->insert('soal',$data);
      return TRUE;
  }
  public function updatelimiter($data,$kondisi)
  {
      $this->db->update('tbl_limiter',$data,$kondisi);
      return TRUE;
  }


    public function update($data,$kondisi)
  {
      $this->db->update('soal',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('soal');
      return TRUE;
  }

}
