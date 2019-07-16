<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model 
        $this->load->model('model_login');
    }

	public function index()
	{
		
			if($this->model_login->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("admin");

			}else{
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            // $password = $this->input->post('password', TRUE);
				$password = MD5($this->input->post('password', TRUE));
				$password2 = ($this->input->post('password', TRUE));
	            
	            //checking data via model
	            $checking1 = $this->model_login->check_login('tb_user', array('username' => $username), array('password' => $password));
	            $checking2 = $this->model_login->check_login('guru', array('nip' => $username), array('password' => $password2));
	            //jika ditemukan, maka create session
	            if ($checking1 != FALSE) {
	                foreach ($checking1 as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->id_user,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
							'user_status' => "SP"
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);

	                    redirect('admin/');

	                }
	            }elseif($checking2 != FALSE){
					foreach ($checking2 as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->id_guru,
							'user_name' => $apps->nama,
							'user_nip' => $apps->nip,
	                        'user_pass' => $apps->password,
							'user_status' => "GR"
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);

	                    redirect('admin/');

	                }
				}else{
	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> Username atau Password Salah !</div></div>';
					$this->load->view('login08', $data);
					
	            }

	        }else{

	            $this->load->view('login08');
	        }

		}

	}
}
