<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_controller{
    private $table = 'tbl_divisi';
    
    public function __construct() { 
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti','logic');
    }

    public function index(){
        $data['divisi'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | Divisi';
        $data['konten'] = 'back-end/master_data/list-divisi/v_divisi';
        $this->load->view('back-end/template', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('divisi', 'Nama divisi', 'required|trim', [
            'required' => 'wajib di isi !'
        ]);

        if ($this->form_validation->run() === false) {
            $this->index();
        } else {
            $divisi = htmlspecialchars(htmlentities($this->input->post('divisi', true)));

            $data = ['nama_divisi' => $divisi];
            $cek = $this->logic->store($this->table, $data);

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-divisi');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-divisi');
            }
        }
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $divisi = htmlspecialchars(htmlentities($this->input->post('divisi')));
        $where = ['id_divisi' => $id];
        $data = [
            'nama_divisi' => $divisi
        ];

        $cek = $this->logic->update($this->table, $data, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-divisi');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-divisi');
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $where = ['id_divisi' => $id];
        $cek = $this->logic->delete($this->table, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-divisi');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-divisi');
        }
    }
}