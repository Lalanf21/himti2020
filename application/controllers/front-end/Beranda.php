<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_himti', 'logic');
		$this->load->helper('text');
	}

	public function index()
	{	
		$data['value'] = $this->logic->get_all('tbl_home_setting')->row();
		$data['carousel'] = $this->logic->get_all('tbl_carousel_setting')->result();
		$data['events'] = $this->logic->query("SELECT * FROM tbl_events WHERE publish = '1' LIMIT 3 ")->result();
		$data['konten'] = 'front-end/beranda';
		$this->load->view('front-end/template' , $data);
	}
}
