<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Tahun_angkatan extends CI_controller{

    private $table = 'tbl_tahun_angkatan';

    

    public function __construct() { 

        parent::__construct();

        is_logged_in('login');

        $this->load->model('M_himti','logic');

    }



    public function index(){

        $data['tahun'] = $this->logic->get_all($this->table)->result();

        $data['title'] = 'HIMTI | Tahun angkatan';

        $data['konten'] = 'back-end/master_data/list-tahun-angkatan/v_tahun_angkatan';

        $this->load->view('back-end/template', $data);

    }



    public function add()

    {

        $this->form_validation->set_rules('tahun_angkatan', 'tahun angkatan', 'required|trim', [

            'required' => 'wajib di isi !',

        ]);



        if ($this->form_validation->run() === false) {

            $this->index();

        } else {

            $tahun = htmlspecialchars(htmlentities($this->input->post('tahun_angkatan', true)));



            $data = ['tahun_angkatan' => $tahun];

            $cek = $this->logic->store($this->table, $data);



            if ($cek > 0) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Data berhasil di simpan !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

                redirect('data-tahun-angkatan');

            } else {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di simpan !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

                redirect('data-tahun-angkatan');

            }

        }

    }



    public function update()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id')));

        $tahun = htmlspecialchars(htmlentities($this->input->post('tahun_angkatan')));

        $where = ['id_angkatan' => $id];

        $data = [

            'tahun_angkatan' => $tahun

        ];



        $cek = $this->logic->update($this->table, $data, $where);



        if ($cek > 0) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Data berhasil di update !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-tahun-angkatan');

        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di update !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-tahun-angkatan');

        }

    }



    public function delete()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id')));

        $where = ['id_angkatan' => $id];

        $cek = $this->logic->delete($this->table, $where);



        if ($cek > 0) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Data berhasil di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-tahun-angkatan');

        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-tahun-angkatan');

        }

    }

}