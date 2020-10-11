<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	require APPPATH . 'third_party/spreadsheet/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\Style\Alignment;

	class CalonAnggota extends CI_controller{

		public function __construct()
		{
			parent::__construct();
			is_logged_in('login');
			$this->load->model('M_himti', 'logic');
		}
		
		public function index()
		{
			$data['title'] = 'List calon anggota';
			$data['calon'] = $this->logic->get_all('tbl_calon_anggota')->result();
			$data['konten'] = 'back-end/pendaftaran/index';
			$this->load->view('back-end/template' , $data);
		}

		public function export_excel()
		{
			$spreadsheet = new Spreadsheet();

			// metadata
			$spreadsheet->getProperties()
			    ->setCreator("Team Web Himti")
			    ->setLastModifiedBy("Team Web Himti")
			    ->setTitle("Pendaftaran calon anggota")
			    ->setSubject("Daftar calon anggota himti")
			    ->setDescription(
			        "Laporan data calon anggota himti"
			    )
			    ->setKeywords("office 2007 openxml php");

		    $sheet = $spreadsheet->getActiveSheet(0);
		    // header
		    $sheet->mergeCells('E1:K1');
		    $sheet->setCellValue('E1', 'Daftar calon anggota himti');
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
    		$sheet->setCellValue('E3', "E-mail");
    		$sheet->setCellValue('F3', "No HP");
    		$sheet->setCellValue('G3', "Semester");
    		$sheet->setCellValue('H3', "Kelas");

    		// isi
			$peserta = $this->logic->get_all('tbl_calon_anggota')->result();
			$no = 1;
			$numrow = 4;
			foreach( $peserta as $key )
			{
    			$sheet->setCellValue('C'. $numrow, $no);
    			$sheet->setCellValue('D'. $numrow, $key->nama);
    			$sheet->setCellValue('E'. $numrow, $key->email);
    			$sheet->setCellValue('F'. $numrow, $key->no_hp);
    			$sheet->setCellValue('G'. $numrow, $key->semester);
    			$sheet->setCellValue('H'. $numrow, $key->kelas);

    			$no++;
    			$numrow++;
			}

			// redirect output to client browser
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="daftar-calon-anggota-2020.xlsx"');
			header('Cache-Control: max-age=0');

			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
		}

		

	}
	
 ?>