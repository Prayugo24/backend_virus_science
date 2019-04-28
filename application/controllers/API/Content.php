<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('model_soal');
		$this->load->model('model_jawaban');
		$this->load->model('model_deskripsi');
		$this->load->helper('form');
		$this->load->helper('url');

	}

	// tampil soal
	public function TampilSoal(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$response['allRoundData'][0]=array(
			"name"=>"Animals",
			"timeLimitInSeconds"=>100,
			"pointsAddedForCorrectAnswer"=>10,
			"questions"=>''
			);
		$soal=$this->model_soal->get_soalRand()->result(); 
		$url=base_url();
		$dataSoal=array();
		$dataSoalLimit=array();
		
		foreach ($soal as $soal) {
			$jawaban=$this->model_jawaban->get_jawabanId($soal->id_soal)->result();
			$answers=array();
			foreach ($jawaban as $jawaban) {
					$answers[]=array(
					"answerText"=>$jawaban->jawaban,
					"isCorrect"=>$jawaban->koreksi
					);	
			}
			$dataSoal[]=array(
				"questionText"=>$soal->soal,
				"answers"=>$answers
				);
		}
		for($i=0;$i<10;$i++){
			$dataSoalLimit[]=$dataSoal[$i];
		}
		
		$response['allRoundData'][0]=array(
			"name"=>"Animals",
			"timeLimitInSeconds"=>100,
			"pointsAddedForCorrectAnswer"=>10,
			"questions"=>$dataSoalLimit
			);

		echo json_encode($response);



	}

	public function deskripsi_jantung(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$data=$this->model_deskripsi->get_deskripsiName()->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['deskripsi'][]=array(
				'nama_materi' =>$data->nama_materi,
				'deskripsi' =>$data->deskripsi,
			);
		}
		echo json_encode($response);
	}


	public function TampilDeskripsi(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		//$id_kategori=$_POST['id_kategori'];
		//$data=$this->model_deskripsi->getData3($id_kategori)->result();
		$data=$this->model_deskripsi->getData()->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['deskripsi'][]=array(
				'id_deskripsi' =>$data->id_deskripsi,
				'nama_materi' =>$data->nama_materi,
				'kategori' =>$data->kategori,
				'deskripsi' =>$data->deskripsi,
			);
		}
		echo json_encode($response);
	}

	public function TampilDeskripsiVirus(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		//$id_kategori=$_POST['id_kategori'];
		//$data=$this->model_deskripsi->getData3($id_kategori)->result();
		$data=$this->model_deskripsi->getDataVirus()->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['deskripsi'][]=array(
				'id_deskripsi' =>$data->id_deskripsi,
				'nama_materi' =>$data->nama_materi,
				'kategori' =>$data->kategori,
				'deskripsi' =>$data->deskripsi,
			);
		}
		echo json_encode($response);
	}

	


	public function getKategori(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$kategori=$_POST['kategori'];
		$data=$this->model_deskripsi->getDataKategori($kategori)->result();
		$url=base_url();
		$response =array();
		foreach ($data as $data) {
			$response['soals'][]=array(
				'id_kategori' =>$data->id_kategori,
				'kategori' =>$data->kategori,
			);
		}
		echo json_encode($response);
	}

}
