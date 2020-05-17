<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_controller{
    private $table = 'tbl_pengguna';
    
    public function __construct() { 
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti','logic');
    }

    public function index(){
        $data['users'] = $this->logic->get_all($this->table)->result();
        $data['pengguna'] = $this->logic->query("SELECT nama_anggota FROM tbl_anggota")->result();
        $data['title'] = 'HIMTI | Data pengguna';
        $data['konten'] = 'back-end/data_pengguna/v_data_pengguna';
        $this->load->view('back-end/template', $data);
    }

    public function get_nim()
    {
        $nim = $this->input->post('id');
        $data = $this->logic->query("SELECT nim FROM tbl_anggota WHERE nama_anggota = '$nim'")->row();
        echo json_encode($data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('level', 'Level', 'required|trim|in_list[superadmin,admin,penulis,anggota]', [
            'required' => 'wajib di isi !',
            'in_list' => 'Silahkan pilih option !',
        ]);

        $this->form_validation->set_rules('status', 'Status', 'required|trim|in_list[0,1]', [
            'required' => 'wajib di isi !',
            'in_list' => 'Silahkan pilih option !',
        ]);

        if ($this->form_validation->run() === false) {
            $this->index();
        } else {
            $nama = htmlspecialchars(htmlentities($this->input->post('nama_pengguna', true)));
            $nim = htmlspecialchars(htmlentities($this->input->post('nim', true)));
            $pass = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            $level = htmlspecialchars(htmlentities($this->input->post('level', true)));
            $status = htmlspecialchars(htmlentities($this->input->post('status', true)));

            $data = [
                'nama_anggota' => $nama,
                'nim' => $nim,
                'password' => $pass,
                'level' => $level,
                'status' => $status
            ];
            $cek = $this->logic->store($this->table, $data);

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('list-pengguna');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('list-pengguna');
            }
        }
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $level = htmlspecialchars(htmlentities($this->input->post('level', true)));
        $status = htmlspecialchars(htmlentities($this->input->post('status', true)));
        $where = ['id_pengguna' => $id];
        $data = [
            'level' => $level,
            'status' => $status
        ];

        $cek = $this->logic->update($this->table, $data, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-pengguna');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-pengguna');
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $where = ['id_pengguna' => $id];
        $cek = $this->logic->delete($this->table, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-pengguna');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-pengguna');
        }
    }
}