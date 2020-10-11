<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Peminatan extends CI_controller{

    private $table = 'tbl_peminatan';

    

    public function __construct() { 

        parent::__construct();

        is_logged_in('login');

        $this->load->model('M_himti','logic');

    }



    public function index(){

        $data['minat'] = $this->logic->get_all($this->table)->result();

        $data['title'] = 'HIMTI | peminatan';

        $data['konten'] = 'back-end/master_data/list-peminatan/v_peminatan';

        $this->load->view('back-end/template', $data);

    }



    public function add()

    {

        $this->form_validation->set_rules('peminatan', 'Peminatan', 'required|trim', [

            'required' => 'wajib di isi !'

        ]);



        if ($this->form_validation->run() === false) {

            $this->index();

        } else {

            $minat = htmlspecialchars(htmlentities($this->input->post('peminatan', true)));

            $status = htmlspecialchars(htmlentities($this->input->post('status', true)));



            $data = [

                'nama_peminatan' => $minat,

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

                redirect('data-peminatan');

            } else {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di simpan !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

                redirect('data-peminatan');

            }

        }

    }



    public function update()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id')));

        $minat = htmlspecialchars(htmlentities($this->input->post('peminatan')));

        $status = htmlspecialchars(htmlentities($this->input->post('status')));



        $where = ['id_peminatan' => $id];

        $data = [

            'nama_peminatan' => $minat,

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

            redirect('data-peminatan');

        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di update !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-peminatan');

        }

    }



    public function delete()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id')));

        $where = ['id_peminatan' => $id];

        $cek = $this->logic->delete($this->table, $where);



        if ($cek > 0) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Data berhasil di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-peminatan');

        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('data-peminatan');

        }

    }

}