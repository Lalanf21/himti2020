<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'third_party/spreadsheet/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\Style\Alignment;

	class Talkshow extends CI_controller{

		public function __construct()
		{
			parent::__construct();
			is_logged_in('login');
			$this->load->model('M_himti', 'logic');
		}
		
		public function index()
		{
			$data['title'] = 'List peserta Talkshow';
			$data['peserta'] = $this->logic->get_all('tbl_talkshow')->result();
			$data['konten'] = 'back-end/talkshow/index';
			$this->load->view('back-end/template' , $data);
		}

		public function form_send_emails()
		{
			$data['title'] = 'Kirim link';
			$data['konten'] = 'back-end/talkshow/send_mail';
			$this->load->view('back-end/template' , $data);
		}

		public function send_emails()
		{
			$link = htmlspecialchars(htmlentities($this->input->post('link',true)));

			$data = $this->logic->get_all('tbl_talkshow')->result();
			foreach ($data as $key){
				$nama_peserta = $key->nama;
				$email = $key->email;

				$this->_send($link,$nama_peserta,$email);
			}

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil di kirim</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('list-peserta');
		}

		private function _send($link, $nama, $email)
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

			$this->email->from('humas@himti-umt.org', 'Link zoom meets '); 
			$this->email->to( $email );

			$this->email->subject('Link zoom meets || Talkshow Data Security 2020 HIMTI'); 
			$data['peserta'] = $nama;
			$data['link'] = $link;
			$this->email->message($this->load->view('back-end/talkshow/v_email',$data, TRUE));

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
                redirect('form-send-emails');
			}
		}

		public function export_excel()
		{
			$spreadsheet = new Spreadsheet();

			// metadata
			$spreadsheet->getProperties()
			    ->setCreator("Team Web Himti")
			    ->setLastModifiedBy("Team Web Himti")
			    ->setTitle("talkshow data security 2020")
			    ->setSubject("Daftar Peserta Talkshow data security")
			    ->setDescription(
			        "Laporan data peserta Talkshow data security 2020"
			    )
			    ->setKeywords("office 2007 openxml php");

		    $sheet = $spreadsheet->getActiveSheet(0);
		    // header
		    $sheet->mergeCells('E1:K1');
		    $sheet->setCellValue('E1', 'Daftar peserta Talkshow data security 2020');
		    $sheet->getStyle('E1')->getFont()->setBold(TRUE);
		    $sheet->getStyle('E1')
    		->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    		// atur width
    		$sheet->getColumnDimension('C')->setAutoSize(true);
    		$sheet->getColumnDimension('D')->setAutoSize(true);
    		$sheet->getColumnDimension('E')->setAutoSize(true);
    		$sheet->getColumnDimension('F')->setAutoSize(true);
    		$sheet->getColumnDimension('G')->setAutoSize(true);
    		$sheet->getColumnDimension('H')->setAutoSize(true);
    		$sheet->getColumnDimension('I')->setAutoSize(true);

    		$sheet->setCellValue('C3', "No");
    		$sheet->setCellValue('D3', "Nama");
    		$sheet->setCellValue('E3', "Asal kampus");
    		$sheet->setCellValue('F3', "Fakultas");
    		$sheet->setCellValue('G3', "E-mail");
    		$sheet->setCellValue('H3', "Semester");
    		$sheet->setCellValue('I3', "No hp");

    		// isi
			$peserta = $this->logic->get_all('tbl_talkshow')->result();
			$no = 1;
			$numrow = 4;
			foreach( $peserta as $key )
			{
    			$sheet->setCellValue('C'. $numrow, $no);
    			$sheet->setCellValue('D'. $numrow, $key->nama);
    			$sheet->setCellValue('E'. $numrow, $key->asal_kampus);
    			$sheet->setCellValue('F'. $numrow, $key->fakultas);
    			$sheet->setCellValue('G'. $numrow, $key->email);
    			$sheet->setCellValue('H'. $numrow, $key->semester);
    			$sheet->setCellValue('I'. $numrow, $key->no_hp);

    			$no++;
    			$numrow++;
			}

			// redirect output to client browser
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="daftar-peserta-talkshow-2020.xlsx"');
			header('Cache-Control: max-age=0');

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
		}

		

	}
	
 ?>