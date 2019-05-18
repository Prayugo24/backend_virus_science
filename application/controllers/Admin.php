<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('model_soal');
		$this->load->model('model_jawaban');
    $this->load->model('model_deskripsi');
    $this->load->model('model_kategori');
    $this->load->model('model_login');
    $this->load->model('m_ganti');
    $this->load->model('m_upload');
    if (!isset($this->session->userdata['user_id'])) {
      redirect("auth");
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }

  function index(){
    if($this->model_login->logged_id())
    {
      $data['total_soal'] = $this->model_soal->total_soal();
      $data['total_jawaban'] = $this->model_jawaban->total_jawaban();
      $data['total_deskripsi'] = $this->model_deskripsi->total_deskripsi();
      $data['gbr']=$this->m_upload->cari();
      $this->load->view("nav/header", $data); 
      $this->load->view("dashboard", $data);  
      $this->load->view("nav/footer");      

    }else{

      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("auth");

    }
    
  }

  public function con_soal()
  {
    $data['data_soal']=$this->model_soal->get_soal();
    $data['gbr']=$this->m_upload->cari();
    $this->load->view("nav/header", $data); 
    $this->load->view('soal', $data);
    $this->load->view('modal/input_soal');
    $this->load->view('modal/update_soal');
    $this->load->view('modal/hapus_soal');
    $this->load->view('nav/footer');
  }

  public function con_jawaban()
  {
    $data['data_jawaban']=$this->model_jawaban->getAllJawaban();
    $data_so['data_soal']=$this->model_jawaban->get_soal();
    $data['gbr']=$this->m_upload->cari();
    $this->load->view("nav/header", $data);
    $this->load->view('jawaban', $data);
    $this->load->view('modal/input_jawaban', $data_so);
    $this->load->view('modal/update_jawaban');
    $this->load->view('modal/hapus_jawaban');
    $this->load->view('nav/footer');
  }

  public function con_deskripsi()
  {
    $data['data_deskripsi']=$this->model_deskripsi->getData();
    $data_ktg['data_kategori']=$this->model_deskripsi->get_kategori();
    $data['gbr']=$this->m_upload->cari();
    $this->load->view("nav/header", $data);
    $this->load->view('deskripsi', $data);
    $this->load->view('modal/input_deskripsi', $data_ktg);
    $this->load->view('modal/update_deskripsi',$data_ktg);
    $this->load->view('modal/hapus_deskripsi');
    $this->load->view('nav/footer');
  }

  public function con_kategori()
  {
    $data['data_kategori']=$this->model_kategori->get_kategori();
    $data_so['data_soal']=$this->model_jawaban->get_soal();
    $data['gbr']=$this->m_upload->cari();
    $this->load->view('nav/header', $data);
    $this->load->view('kategori', $data);
    $this->load->view('modal/input_kategori');
    $this->load->view('modal/update_kategori');
    $this->load->view('modal/hapus_kategori');
    $this->load->view('nav/footer');
  }

//CRUD jawaban
  //input jawaban
  function add_jawaban(){
    $kode_jawaban = $this->input->post('kode_jawaban');
    $jawaban = $this->input->post('jawaban');
    $id_soal = $this->input->post('id_soal');
    $koreksi = $this->input->post('koreksi');
    $idSoal=$this->model_jawaban->getCountIdSoal("where id_soal='$id_soal'")->result();
    foreach($idSoal as $idSoal){
      $countidSoal=$idSoal->total_id;
    }
    if($countidSoal<4){
    $data = array(
      'kode_jawaban' => $this->model_jawaban->code_jawaban(),
      'jawaban' => $jawaban,
      'id_soal' => $id_soal,
      'koreksi' => $koreksi,
      );
    $this->model_jawaban->input_jawaban($data,'pilihan_jawaban');
    redirect('admin/con_jawaban');
    }else{
      $this->session->set_flashdata('error','Maksimal jawaban untuk 1 soal adalah 4 lebih dari itu jawaban tidak akan disimpan' );
      redirect('admin/con_jawaban');
    }
  }

  //delete jawaban
  function delete_jawaban(){
    $kode_jawaban=$this->input->post('kode_jawaban');
    $this->model_jawaban->delete_jawaban($kode_jawaban);
    redirect('admin/con_jawaban');
  }

public function edit_jawaban(){

    $kode_jawaban = $this->input->get('kode_jawaban');
    $data =$this->model_jawaban->getjawabanId($kode_jawaban);
      // var_dump($data);
      // die();
    foreach ($data as $data) {
      echo '<div id="kode_jawaban">'.$data->kode_jawaban.'</div>';
      echo '<div id="jawaban">'.$data->jawaban.'</div>';
      echo '<div id="id_soal">'.$data->id_soal.'</div>';
      echo '<div id="koreksi">'.$data->koreksi.'</div>';
    }
  }

  function update_jawaban(){
  // untuk menampung data post yang dikirim
    $kode_jawaban = $this->input->post('kode_jawaban');
    $jawaban = $this->input->post('jawaban');
    $id_soal = $this->input->post('id_soal');
    $koreksi = $this->input->post('koreksi');
    //untuk memasukan ke tabel database
    $data=array(
      'jawaban' => $jawaban,
      'id_soal' => $id_soal,
      'koreksi' => $koreksi
      );
    //menampung kd kaaryawan
    $where=array(
      'kode_jawaban'=>$kode_jawaban
      );
    // untuk mengubah data dan mengirim data ke database
    $this->model_jawaban->update_jawaban($where,$data,'pilihan_jawaban');
    redirect('admin/con_jawaban');
  }

  //CRUD deskripsi
  //input deskripsi
  function add_deskripsi(){
    $id_deskripsi = $this->input->post('id_deskripsi');
    $nama_materi = $this->input->post('nama_materi');
    $id_kategori = $this->input->post('id_kategori');
    $deskripsi = $this->input->post('deskripsi');
    $data = array(
      'id_deskripsi' => $this->model_deskripsi->code_deskripsi(),
      'nama_materi' => $nama_materi,
      'id_kategori' => $id_kategori,
      'deskripsi' => $deskripsi,
      );
    $this->model_deskripsi->input_deskripsi($data,'tb_deskripsi');
    redirect('admin/con_deskripsi');
  }

  //delete deskripsi
  function delete_deskripsi(){
    $id_deskripsi=$this->input->post('id_deskripsi');
    $this->model_deskripsi->delete_deskripsi($id_deskripsi);
    redirect('admin/con_deskripsi');
  }

  public function edit_deskripsi(){

    $id_deskripsi = $this->input->get('id_deskripsi');
    $data =$this->model_deskripsi->getDataId($id_deskripsi);
      // var_dump($data);
      // die();
    foreach ($data as $data) {
      echo '<div id="id_deskripsi">'.$data->id_deskripsi.'</div>';
      echo '<div id="nama_materi">'.$data->nama_materi.'</div>';
      echo '<div id="id_kategori">'.$data->id_kategori.'</div>';
      echo '<div id="deskripsi">'.$data->deskripsi.'</div>';
    }
  }

  function update_deskripsi(){
  // untuk menampung data post yang dikirim
    $id_deskripsi=$this->input->post('id_deskripsi');
    $nama_materi = $this->input->post('nama_materi');
    $id_kategori = $this->input->post('id_kategori');
    $deskripsi=$this->input->post('deskripsi');
    //untuk memasukan ke tabel database
    $data=array(
      'nama_materi'=>$nama_materi,
      'id_kategori'=>$id_kategori,
      'deskripsi'=>$deskripsi
      );
    //menampung kd kaaryawan
    $where=array(
      'id_deskripsi'=>$id_deskripsi
      );
    // untuk mengubah data dan mengirim data ke database
    $this->model_deskripsi->update_deskripsi($where,$data,'tb_deskripsi');
    redirect('admin/con_deskripsi');
  }

  //CRUD kategori
  function add_kategori(){
    $kategori = $this->input->post('kategori');
    $data = array(
      'kategori' => $kategori,
      );
    $this->model_kategori->input_kategori($data,'tb_kategori');
    redirect('admin/con_kategori');
  }

  //delete deskripsi
  function delete_kategori(){
    $id_kategori=$this->input->post('id_kategori');
    $this->model_kategori->delete_kategori($id_kategori);
    redirect('admin/con_kategori');
  }

  function update_kategori(){
  // untuk menampung data post yang dikirim
    $id_kategori=$this->input->post('id_kategori');
    $kategori=$this->input->post('kategori');
    //untuk memasukan ke tabel database
    $data=array(
      'kategori'=>$kategori,
      );
    //menampung kd kaaryawan
    $where=array(
      'id_kategori'=>$id_kategori
      );
    // untuk mengubah data dan mengirim data ke database
    $this->model_kategori->update_kategori($where,$data,'tb_kategori');
    redirect('admin/con_kategori');
  } 


  //CRUD SOAL
  public function insertdata()
  {
    $soal   = $this->input->post('soal');
    $id_soal   = $this->input->post('id_soal');
    // $gambar = "cth";

      // get foto
    // $config['upload_path'] = './assets/img';
    // $config['allowed_types'] = 'jpg|png|jpeg|gif';
    //   $config['max_size'] = '2048';  //2MB max
    //   $config['max_width'] = '4480'; // pixel
    //   $config['max_height'] = '4480'; // pixel
    //   $config['file_name'] = $_FILES['gambar']['name'];

      // $this->upload->initialize($config);

      // if (!empty($_FILES['gambar']['name'])) {
        
      //  if ( $this->upload->do_upload('gambar') ) {
      //   // if ( !empty($gambar) ) {
         
      //    $foto = $this->upload->data();
      //    $data = array(
      //      'soal'       => $soal,
      //      'gambar'       => $foto['file_name'],
      //      'id_soal' => $this->model_soal->code_soal(),
      //      );
      //    $this->model_soal->insert($data);
      //    redirect('admin/con_soal');
      //  }else {
      //   die("gagal upload");
      // }
      // }else {
      // echo "tidak masuk";
      // }

      if(!empty($soal)){
        $data = array(
          'soal'       => $soal,
          'gambar'       => 'null',
          'id_soal' => $this->model_soal->code_soal(),
          );
        $this->model_soal->insert($data);
        redirect('admin/con_soal');
      }else{
        die("gagal upload");
      }

 }


  // update
 public function updatedata()
 {
  $soal   = $this->input->post('soal');
  $id_soal   = $this->input->post('id_soal');
  // $filelama = $this->input->post('filelama');

  // $path = './assets/img/';

  $kondisi = array('id_soal' => $id_soal );

      // get foto
  // $config['upload_path'] = './assets/img';
  // $config['allowed_types'] = 'jpg|png|jpeg|gif';
  //     $config['max_size'] = '2048';  //2MB max
  //     $config['max_width'] = '4480'; // pixel
  //     $config['max_height'] = '4480'; // pixel
  //     $config['file_name'] = $_FILES['gambar']['name'];

      // $this->upload->initialize($config);

      // if (!empty($_FILES['gambar']['name'])) {
      //  if ( $this->upload->do_upload('gambar') ) {
      //    $foto = $this->upload->data();
      //    $data = array(
      //      'soal'       => $soal,
      //      'gambar'       => $foto['file_name'],
      //      );
      //         // hapus foto pada direktori
      //    @unlink($path.$this->input->post('filelama'));

      //    $this->model_soal->update($data,$kondisi);
      //    redirect('admin/con_soal');
      //  }else {
      //    die("gagal update");
      //  }
      // }else {
      //     //echo "tidak masuk";
      //     // $foto = $this->upload->data();
      //   $data = array(
      //     'soal'       => $soal,
      //     'gambar'       => $filelama,
      //     );



      //   $this->model_soal->update($data,$kondisi);
      //   redirect('admin/con_soal');
      // }

     if(!empty($soal)){
      $data = array(
        'soal'       => $soal,
        'gambar'       => "null",
        );
        $this->model_soal->update($data,$kondisi);
        redirect('admin/con_soal');
      }else{
        die("gagal upload");
      }


   }

    // delete
   public function deletedata($id_soal,$gambar)
   {
    $path = './assets/img/';
    @unlink($path.$gambar);

    $where = array('id_soal' => $id_soal );
    $this->model_soal->delete($where);
    return redirect('admin/con_soal');
  }



}
