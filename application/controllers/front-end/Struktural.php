<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktural extends CI_controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_himti', 'logic');
    }

    public function index()
    {
        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['kahim'] = $this->logic->query("SELECT * FROM tbl_anggota WHERE nama_divisi = 'ketua'")->row();
        $data['wakahim'] = $this->logic->query("SELECT * FROM tbl_anggota WHERE nama_divisi = 'wakil ketua'")->row();
        $data['divisi'] = $this->logic->query("SELECT nama_divisi FROM tbl_divisi WHERE nama_divisi != 'ketua' AND nama_divisi !='Wakil ketua' ")->result();
        $data['konten'] = 'front-end/struktural/view';
        $this->load->view('front-end/template', $data);
    }
}
