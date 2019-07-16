<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Guru extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('model_soal');
		$this->load->model('model_jawaban');
    $this->load->model('model_deskripsi');
    $this->load->model('model_kategori');
    $this->load->model('model_login');
    $this->load->model('model_jwbn_guru');
    $this->load->model('model_tmbh_guru');
    $this->load->model('model_tmbh_siswa');
    $this->load->model('model_prtnya_s');
    $this->load->model('m_ganti');
    $this->load->model('m_upload');
    if (!isset($this->session->userdata['user_id'])) {
      redirect("auth");
    }
  }

  function profilGuru(){
		$data['gbr']=$this->m_upload->cari();
		// print_r($data);exit;
		$this->load->view("nav/header", $data);
		$this->load->view('profil_guru');
		$this->load->view('nav/footer');
  }
  
  public function save_password()
	{ 
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE)
		{
			$data['gbr']=$this->m_upload->cari();
			$this->load->view("nav/header", $data);
			$this->load->view('profil_guru');
			$this->load->view('nav/footer');
		}else{
			$cek_old = $this->m_ganti->cek_old();
			if ($cek_old == False){
				$this->session->set_flashdata('error','Old password not match!' );
				$data['gbr']=$this->m_upload->cari();
				$this->load->view("nav/header", $data);
				$this->load->view('profil_guru');
				$this->load->view('nav/footer');
			}else{
				$this->m_ganti->save();
				// $this->session->sess_destroy();
				$this->session->set_flashdata('error','Your password success to change, please relogin !' );
				$data['gbr']=$this->m_upload->cari();
				$this->load->view("nav/header", $data);
				$this->load->view('profil_guru');
				$this->load->view('nav/footer');
   }//end if valid_user
  }
  }
  public function pertanyaanSiswa(){
    if($this->model_login->logged_id())
    {
        $nip =$this->session->userdata['user_nip'];
        $data['data_pertanyaanS']=$this->model_prtnya_s->get_pertanyaanS($nip);
        $data['gbr']=$this->m_upload->cari();
        $this->load->view("nav/header", $data); 
        $this->load->view("pertanyaan_siswa", $data);  
        $this->load->view('modal/update_pertanyaans');
        $this->load->view('modal/hapus_pertanyaans');
        $this->load->view('nav/footer');      

    }else{
      redirect("auth");

    }
    
  }

  public function TambahGuru(){
    if($this->model_login->logged_id())
    {
        $data['data_guru']=$this->model_tmbh_guru->get_guru();
        $data['gbr']=$this->m_upload->cari();
        $this->load->view("nav/header", $data); 
        $this->load->view("tambah_guru", $data);  
        $this->load->view('modal/input_guru');
        $this->load->view('modal/input_limiter');
        $this->load->view('modal/update_guru');
        $this->load->view('modal/hapus_guru');
        $this->load->view('nav/footer');
    }else{
      redirect("auth");
    }
    
  }

  public function TambahSiswa(){
    if($this->model_login->logged_id())
    {
        $data['data_siswa']=$this->model_tmbh_siswa->get_siswa();
        $data['gbr']=$this->m_upload->cari();
        $this->load->view("nav/header", $data); 
        $this->load->view("tambah_siswa", $data);  
        $this->load->view('modal/input_siswa');
        $this->load->view('modal/update_siswa');
        $this->load->view('modal/hapus_siswa');
        $this->load->view('nav/footer');
    }else{
      redirect("auth");
    }
    
  }

  public function JawabanGuru(){
    if($this->model_login->logged_id())
    {
      $nip =$this->session->userdata['user_nip'];
        $data['data_jwbn_guru']=$this->model_jwbn_guru->get_jwbnGuru($nip);
        $data['gbr']=$this->m_upload->cari();
        $this->load->view("nav/header", $data); 
        $this->load->view("jawaban_guru", $data);
        $this->load->view('modal/update_jawaban_guru');
        $this->load->view('modal/hapus_jawaban_guru');
        $this->load->view('nav/footer');   

    }else{
      redirect("auth");
    }
    
  }


   //CRUD SOAL
   public function tambahDataGuru()
   {
     $nama   = $this->input->post('nama');
     $nip   = $this->input->post('nip');
       if(!empty($nama)){
         $data = array(
           'nama'       => $nama,
           'nip'       => $nip,
           'password'       => $nip,
           'id_guru' => $this->model_tmbh_guru->code_guru(),
           );
         $this->model_tmbh_guru->insert($data);
         redirect('admin_guru/TambahGuru');
       }else{
         die("gagal upload");
       }
 
  }
   // update
 public function EditDataGuru()
 {
  $nama   = $this->input->post('nama');
  $nip   = $this->input->post('nip');
  $id_guru   = $this->input->post('id_guru');
  $kondisi = array('id_guru' => $id_guru );


     if(!empty($id_guru)){
      $data = array(
        'nama'       => $nama,
        'nip'       => $nip,
        'password'       => MD5($nip),
        );
        $this->model_tmbh_guru->update($data,$kondisi);
        redirect('admin_guru/TambahGuru');
      }else{
        die("gagal upload");
      }
   }

    // delete
    public function deletedataGuru($id_guru)
    {
     $where = array('id_guru' => $id_guru );
     $this->model_tmbh_guru->delete($where);
     redirect('admin_guru/TambahGuru');
   }

    //CRUD SOAL
    public function tambahDataJawaban()
    {
      $nip   = $this->input->post('nip');
      $id_pertanyaan   = $this->input->post('id_pertanyaan');
      $jawaban   = $this->input->post('jawaban');
      $pertanyaan   = $this->input->post('pertanyaan');
      $nis   = $this->input->post('nis');
        if(!empty($id_pertanyaan)){
          $data = array(
            'id_pertanyaan'       => $id_pertanyaan,
            'jawaban'       => $jawaban,
            'nip'       => $nip,
            'nis'       => $nis,
            'id_jawaban' => $this->model_jwbn_guru->code_jwbnGuru(),
            );
          $this->model_jwbn_guru->insert($data);
          $kondisi = array('id_pertanyaan' => $id_pertanyaan );
          $data2 = array(
            'pertanyaan'       => $pertanyaan,
            'nip'       => $nip,
            'nis'       => $nis,
            'status'       => "yes",
            );
            $this->model_prtnya_s->update($data2,$kondisi);
          redirect('admin_guru/pertanyaanSiswa');
        }else{
          die("gagal upload");
        }
   }

     // delete
     public function deletedataPertanyaanS($id_pertanyaan)
     {
      
      $id_jawaban = $this->model_jwbn_guru->get_idPertanyaanJawaban($id_pertanyaan)->result();
      $IdJawaban="";
      foreach($id_jawaban as $id_jawaban){
        $IdJawaban=$id_jawaban->id_jawaban;
      }
      $where1 = array('id_pertanyaan' => $id_pertanyaan );
      $where2 = array('id_jawaban' => $IdJawaban );
      $this->model_jwbn_guru->delete($where2);
      $this->model_prtnya_s->delete($where1);
      redirect('admin_guru/pertanyaanSiswa');
    }

        // update
    public function EditDataJawabanGuru()
    {
      $nip   = $this->input->post('nip');
      $nis   = $this->input->post('nis');
      $jawaban   = $this->input->post('jawaban');
      $id_jawaban   = $this->input->post('id_jawaban');
      $id_pertanyaan   = $this->input->post('id_pertanyaan');
      $kondisi = array('id_jawaban' => $id_jawaban );


        if(!empty($id_jawaban)){
          $data = array(
            'id_pertanyaan'       => $id_pertanyaan,
            'jawaban'       => $jawaban,
            'nip'       => $nip,
            'nis'       => $nis,
            );
            $this->model_jwbn_guru->update($data,$kondisi);
            redirect('admin_guru/JawabanGuru');
          }else{
            die("gagal upload");
          }
      }

      // delete
    public function deleteJawabanGuru($id_jawaban)
    {
     $where = array('id_jawaban' => $id_jawaban );
     $this->model_jwbn_guru->delete($where);
     redirect('admin_guru/JawabanGuru');
   }


   //CRUD SOAL
   public function tambahDataSiswa()
   {
     $nama   = $this->input->post('nama');
     $nis   = $this->input->post('Nis');
     $password   = $this->input->post('password');
       if(!empty($nama)){
         $data = array(
           'nama'       => $nama,
           'nis'       => $nis,
           'password'       => $password,
           'id_siswa' => $this->model_tmbh_guru->code_guru(),
           );
         $this->model_tmbh_siswa->insert($data);
         redirect('admin_guru/TambahSiswa');
       }else{
         die("gagal upload");
       }
 
  }
   // update
 public function EditDataSiswa()
 {
  $nama   = $this->input->post('nama');
  $nis   = $this->input->post('nis');
  $id_siswa   = $this->input->post('id_siswa');
  $password   = $this->input->post('password');
  $kondisi = array('id_siswa' => $id_siswa );


     if(!empty($id_siswa)){
      $data = array(
        'nama'       => $nama,
        'nis'       => $nis,
        'password'       => MD5($nis),
        );
        $this->model_tmbh_siswa->update($data,$kondisi);
        redirect('admin_guru/TambahSiswa');
      }else{
        die("gagal upload");
      }
   }

    // delete
    public function deletedataSiswa($id_siswa)
    {
     $where = array('id_siswa' => $id_siswa );
     $this->model_tmbh_siswa->delete($where);
     redirect('admin_guru/TambahSiswa');
   }
}