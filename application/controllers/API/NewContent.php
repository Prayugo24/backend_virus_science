<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewContent extends CI_Controller {
	function __construct(){
		parent:: __construct();
        $this->load->model('model_soal');
		$this->load->model('model_jawaban');
        $this->load->model('model_deskripsi');
        $this->load->model('model_kategori');
        $this->load->model('model_login');
        $this->load->model('model_jwbn_guru');
        $this->load->model('model_tmbh_guru');
        $this->load->model('model_prtnya_s');
        $this->load->model('m_ganti');
        $this->load->model('m_upload');

    }

 //CRUD SOAL
 public function tambahDataPertanyaanS()
 {
    header('Content-Type:application/json');
    header('Accept:application/json');
   $nama_guru   = $this->input->post('nama_guru');
   $pertanyaan   = $this->input->post('pertanyaan');
   $nis   = $this->input->post('nis');
   $status   = "no";
   $response =array();
   $NIP = $this->model_tmbh_guru->get_guruNip($nama_guru)->result();
   foreach($NIP as $data){
     $nip =$data->nip;
   }

     if(!empty($pertanyaan)&&!empty($nip)&&!empty($nis)){
       $data = array(
         'nip'       => $nip,
         'pertanyaan'       => $pertanyaan,
         'nis'       => $nis,
         'status'       => $status,
         'id_pertanyaan' => $this->model_prtnya_s->code_pertanyaanS(),
         );
       $this->model_prtnya_s->insert($data);
       $response['pertanyaan'][]=array(
           "status"=>"Succes"
       );
       echo json_encode($response);
     }else{
      $response['pertanyaan'][]=array(
            "status"=>"failed"
        );
        echo json_encode($response);
     }

}

public function getJawaban()
 {
    header('Content-Type:application/json');
    header('Accept:application/json');
    $nis   = $this->input->post('nis');
    $data=$this->model_jwbn_guru->get_jwbnWhereNis($nis)->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['Jawaban'][]=array(
				'id_jawaban' =>$data->id_jawaban,
				'jawaban' =>$data->jawaban,
				'pertanyaan' =>$data->pertanyaan,
				'nama_guru' =>$data->nama_guru,
			);
		}
		echo json_encode($response);
}
public function getDataGuru()
 {
    header('Content-Type:application/json');
    header('Accept:application/json');
    $nis   = $this->input->post('nis');
    $data=$this->model_tmbh_guru->get_guru()->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['Guru'][]=array(
        'id_guru' =>$data->id_guru,
        'nip' =>$data->nip,
				'nama' =>$data->nama
			);
		}
		echo json_encode($response);
}

public function LoginSiswa(){
  header('Content-Type:application/json');
  header('Accept:application/json');
  $nis   = $this->input->post('nis');
  $password   = $this->input->post('password');
  $checking1 = $this->model_login->check_login('tb_siswa', array('nis' => $nis), array('password' => $password));
  $response =array();
	  if ($checking1 != FALSE) {
	    foreach ($checking1 as $apps) {
        $response['dataSiswa'][]= array(
	       'id_siswa'   => $apps->id_siswa,
	       'nis' => $apps->nis,
         'nama' => $apps->nama,
         'status' => "success"
	     );

      }
      echo json_encode($response);
	  }else{
      $response['dataSiswa'][]= array(
        'id_siswa'   => "",
	       'nis' => "",
         'nama' => "",
        'status' => "Failed"
      );
      echo json_encode($response);
    }
  }
}