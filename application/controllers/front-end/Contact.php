<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_himti', 'logic');
    }

    public function index()
    {
        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['konten'] = 'front-end/kontak-kami/view';
        $this->load->view('front-end/template', $data);
    }
}
