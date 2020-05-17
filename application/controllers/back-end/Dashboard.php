<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
    }

    public function index(){
        $data['konten'] = 'back-end/dashboard/view';
        $data['title'] = 'HIMTI|Dashboard';
        $this->load->view('back-end/template', $data);
    }
}