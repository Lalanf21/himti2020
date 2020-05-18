<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Talkshow extends CI_controller{

		public function __construct()
		{
			parent::__construct();

			$this->load->model('M_himti', 'logic');
		}
		
		public function index()
		{
			$data['value'] = $this->logic->get_all('tbl_home_setting')->row();
			$data['konten'] = 'front-end/talkshow/index';
			$this->load->view('front-end/template' , $data);
		}

		public function form_register()
		{
			$data['value'] = $this->logic->get_all('tbl_home_setting')->row();
			$data['konten'] = 'front-end/talkshow/form_register';
			$this->load->view('front-end/template' , $data);
		}

		public function rules()
		{
			$this->form_validation->set_rules('nama','Nama','required|trim',[
				'required'=>'wajib di isi !'
			]);

			$this->form_validation->set_rules('semester','Semester','required|trim|numeric',[
				'required'=>'wajib di isi !',
				'numeric'=>'Silahkan pilih option dahulu !',
			]);

			$this->form_validation->set_rules('asal_kampus','Asal kampus','required|trim',[
				'required'=>'wajib di isi !'
			]);

			$this->form_validation->set_rules('fakultas','Fakultas','required|trim',[
				'required'=>'wajib di isi !'
			]);

			$this->form_validation->set_rules('email','Email','required|trim',[
				'required'=>'wajib di isi !',
			]);

			$this->form_validation->set_rules('no_hp','No hp','required|trim|numeric',[
				'required'=>'wajib di isi !',
				'numeric'=> 'No HP tidak valid !',
			]);
		}

		public function save()
		{
			$this->rules();
			if($this->form_validation->run() === FALSE){
				$this->form_register();
			}else{
				$nama = htmlspecialchars(htmlentities($this->input->post('nama',true)));
				$semester = htmlspecialchars(htmlentities($this->input->post('semester',true)));
				$asal_kampus = htmlspecialchars(htmlentities($this->input->post('asal_kampus',true)));
				$fakultas = htmlspecialchars(htmlentities($this->input->post('fakultas',true)));
				$email = htmlspecialchars(htmlentities($this->input->post('email',true)));
				$no_hp = htmlspecialchars(htmlentities($this->input->post('no_hp',true)));

				$data = [
	                'nama' => $nama,
	                'semester' => $semester,
	                'asal_kampus' => $asal_kampus,
	                'fakultas'=> $fakultas,
	                'email'=> $email,
	                'no_hp'=> $no_hp,
	            ];

	            $kuota = $this->db->count_all_results('tbl_talkshow');

	            if($kuota > 500){
	                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	                <strong>Pendaftaran Anda gagal, Kuota sudah tidak tersedia !!</strong> 
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                </div>');
	                redirect('register-talkshow-data-security');
	            }

	            $cek = $this->logic->store('tbl_talkshow',$data);

	            if($cek > 0){
		            // kirim email
		            $this->_sendEmail($email, $nama);

	                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	                <strong>Pendaftaran anda berhasil, silahkan cek email !!</strong> 
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                </div>');
	                redirect('register-talkshow-data-security');
	            }else{
	                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	                <strong>Pendaftaran anda gagal !!</strong> 
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                </div>');
	                redirect('register-talkshow-data-security');
	            }
			}
		}

		private function _sendEmail($email, $nama)
		{
			$config = [
				'protocol' 	=>'smtp',
				'smtp_host' =>'mail.himti-umt.org',
				'smtp_port'	=> '587',
				'smtp_user'	=>'humas@himti-umt.org',
				'smtp_pass'	=>'Humas2020',
				'mailtype'	=>'html',
				'charset'   =>'utf-8'
			];

			$this->load->library('email', $config);
			// $this->email->initialize($config); 

			$this->email->set_newline("\r\n");

			$this->email->from('humas@himti-umt.org', 'Pendaftaran talkshow data security 2020'); 
			$this->email->to( $email );

			$this->email->subject('Pendaftaran slot talkshow Himti '); 
			$data['peserta'] = $nama;
			$this->email->message($this->load->view('front-end/talkshow/v_email',$data, TRUE));

			$cek = $this->email->send();
			
			if ( $cek ) {
				return true;
			} else { 
				$this->session->set_flashdata('pesan', $this->email->print_debugger('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'));
                redirect('register-talkshow-data-security');
			}
		}	



	}
	
 ?>