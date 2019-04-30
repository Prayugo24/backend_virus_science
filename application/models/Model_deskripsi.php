<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_deskripsi extends CI_Model {

	public function get_kategori(){
		$query = $this->db->get('tb_kategori');
		return $query;
	}

  public function get_deskripsiName(){
    $query = $this->db->query("SELECT tb_deskripsi.nama_materi, tb_deskripsi.deskripsi FROM tb_deskripsi WHERE tb_deskripsi.nama_materi='Jantung'");
    return $query;
  }

  public function total_deskripsi(){
    $query = $this->db->query("select * from tb_deskripsi");
    $total = $query->num_rows();
    return $total;
  }

  public function getData(){
    $this->db->order_by('id_deskripsi', 'desc');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $query = $this->db->get();
    return $query;
  }

  public function getDataVirus(){
    $this->db->order_by('id_deskripsi', 'ASC');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('tb_deskripsi.id_kategori',1);
    $query = $this->db->get();
    return $query;
  }
  public function getDataBakteri(){
    $this->db->order_by('id_deskripsi', 'ASC');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('tb_deskripsi.id_kategori',2);
    $query = $this->db->get();
    return $query;
  }
  public function getDataJamur(){
    $this->db->order_by('id_deskripsi', 'ASC');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('tb_deskripsi.id_kategori',3);
    $query = $this->db->get();
    return $query;
  }
  public function getDataProtista(){
    $this->db->order_by('id_deskripsi', 'ASC');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('tb_deskripsi.id_kategori',4);
    $query = $this->db->get();
    return $query;
  }

  public function getDataId($id_deskripsi){
    $this->db->order_by('id_deskripsi', 'desc');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('id_deskripsi',$id_deskripsi);
    $query = $this->db->get();
    return $query->result();
  }

  public function getData2($id_kategori){
     $this->db->select('*');
    $this->db->from('tb_deskripsi');
    $this->db->where('id_kategori',$id_kategori);
    $query=$this->db->get();
    return $query;
  }
  

  public function getData3($id_kategori){
    $this->db->order_by('id_deskripsi', 'desc');
    $this->db->select('tb_deskripsi.id_deskripsi, tb_deskripsi.deskripsi, tb_deskripsi.nama_materi, tb_deskripsi.id_kategori, tb_kategori.id_kategori, tb_kategori.kategori');
    $this->db->from('tb_deskripsi');
    $this->db->join('tb_kategori','tb_deskripsi.id_kategori=tb_kategori.id_kategori');
    $this->db->where('tb_kategori.id_kategori',$id_kategori);
    $query = $this->db->get();
    return $query;
  }

  public function getDataKategori($kategori){
    $this->db->select('*');
    $this->db->from('tb_kategori');
    $this->db->where('kategori',$kategori);
    $query=$this->db->get();
    return $query;  
  }

function code_deskripsi(){
    $this->db->select('RIGHT(tb_deskripsi.id_deskripsi,3) as kode',false );
    $this->db->order_by('id_deskripsi','DESC');
    $this->db->limit(1);
      $query=$this->db->get('tb_deskripsi');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

      $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 3 menunjukan jumlah angka digit 0
      $kodeJadi="Des-".$kodeMax;
      return $kodeJadi;
    }

  public function input_deskripsi($data, $table){
    $this->db->insert($table, $data);
  }


   function delete_deskripsi($id_deskripsi){
        $hasil=$this->db->query("DELETE FROM tb_deskripsi WHERE id_deskripsi='$id_deskripsi'");
        return $hasil;
    }
      

  function update_deskripsi($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}
