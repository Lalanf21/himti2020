<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
		}

	public function index()
	{
		$this->session->sess_destroy();
		$data['title'] = 'HIMTI || Login Panel';
		$this->load->view('front-end/login/v_login', $data);
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => "wajib di isi !"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[2]', [
			'required' => 'wajib di isi !',
			'min_length' => 'Password minimal 2 karakter'
		]);


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'HIMTI || Login Panel';
			$this->load->view('front-end/login/v_login', $data);
		} else {
			$username = htmlspecialchars(htmlentities($this->input->post('username', true)));
			$pass = htmlspecialchars(htmlentities($this->input->post('password',true)));

			$cek_user = $this->login_model->cek_user($username)->row_array();

			if ($cek_user) {
				$cek_pass = $this->login_model->cek_pass($pass, $cek_user['password']);
				if ($cek_pass == true) {
					$sess_data = [
						'nama' => $cek_user['nama_anggota'],
						'level' => $cek_user['level'],
						'logged_in' => true,
						'is_downloadable' => true,
					];

					$this->session->set_userdata($sess_data);
					if($this->session->userdata('level') == 'anggota'){
						redirect( base_url() );
					} else{
						redirect('dashboard');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password anda salah !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Nama anggota / NIM anda tidak terdaftar !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	}
	
 ?>