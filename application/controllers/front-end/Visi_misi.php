<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_misi extends CI_controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_himti', 'logic');
    }

    public function index(){
        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['visiMisi'] = $this->logic->get_all('tbl_visi_misi')->result();
        $data['konten'] = 'front-end/visi-misi/view';
        $this->load->view('front-end/template', $data);
    }
}