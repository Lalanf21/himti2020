<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_himti', 'logic');
    }

    public function index(){
        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['minat'] = $this->logic->get_where('tbl_peminatan', ['status' => '1'])->result();
        $data['konten'] = 'front-end/modul/view';
        $this->load->view('front-end/template', $data);
    }

    public function download($modul) { 
        $downloadAble = $this->session->userdata('is_downloadable');
        if ($downloadAble != true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Untuk download modul, Silahkan login dahulu !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('login');
        } else{
            $this->db->query("UPDATE tbl_modul SET download = download+1 WHERE modul = '$modul'");
            $this->load->helper('download');
            $url = FCPATH.'assets/modul/'.$modul;
            force_download($url, null);
        }
        
    }
}