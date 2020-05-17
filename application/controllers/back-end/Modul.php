<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_controller
{
    private $table = 'tbl_modul';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti', 'logic');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['modul'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | modul';
        $data['minat'] = $this->logic->get_where('tbl_peminatan', ['status' => '1'])->result();
        $data['konten'] = 'back-end/modul/v_modul';
        $this->load->view('back-end/template', $data);
    }
    
    public function form_add()
    {
        $data['title'] = 'HIMTI | add modul';
        $data['minat'] = $this->logic->get_where('tbl_peminatan', ['status' => '1'])->result();
        $data['konten'] = 'back-end/modul/form_add';
        $this->load->view('back-end/template', $data);
    }

    private function _rules()
    {

        $this->form_validation->set_rules('minat', 'Minat', 'required|trim', [
            'required' => 'Pilih option dahulu !',
        ]);
        $this->form_validation->set_rules('share', 'Share', 'required|trim', [
            'required' => 'Pilih option dahulu !',
        ]);
    }

    public function add()
    {
        $this->_rules();

        if ($this->form_validation->run() === false) {
            $this->form_add();
        } else {
            $modul = $_FILES['modul']['name'];
            $minat = htmlspecialchars(htmlentities($this->input->post('minat', true)));
            $download = htmlspecialchars(htmlentities($this->input->post('download', true)));
            $share = htmlspecialchars(htmlentities($this->input->post('share', true)));

            if (empty($modul)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> pilih modul untuk di upload dahulu !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('add-modul');
            } else {
                $cekModul = $this->logic->query("SELECT modul FROM tbl_modul WHERE modul = '$modul' ");
                if ($cekModul->num_rows() > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> Modul sudah ada !</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('add-modul');
                } else {
                    $config['upload_path'] = './assets/modul/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2048';
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('modul')) {
                        $upload = $this->upload->data();
                        $newModul = $upload['file_name'];

                        $data = [
                            'modul' => $newModul,
                            'nama_peminatan' => $minat,
                            'download' => $download,
                            'share' => $share
                        ];

                        $cek = $this->logic->store($this->table, $data);

                        if ($cek > 0) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil di simpan!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                            redirect('list-modul');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data gagal di simpan</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                            redirect('list-modul');
                        }
                    } else {
                        $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>', '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'));
                        redirect('add-modul');
                    }
                }
            }
        }
    }


    public function update()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->index();
        }else{
            $minat = htmlspecialchars(htmlentities($this->input->post('minat', true)));
            $share = htmlspecialchars(htmlentities($this->input->post('share', true)));
            $id = htmlspecialchars(htmlentities($this->input->post('id', true)));
            

            $data = [
                'nama_peminatan' => $minat,
                'share' => $share
            ];

            $where = ['id_modul' => $id];
            $cek = $this->logic->update($this->table, $data, $where);

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil di update</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('list-modul');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Gagal di update!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('list-modul');
            }
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        
        $modulLama = $this->logic->query("SELECT modul FROM tbl_modul WHERE id_modul = '$id'")->row();
        $where = ['id_modul' => $id];
        unlink(FCPATH . 'assets/modul/' . $modulLama->modul);
        $cek = $this->logic->delete($this->table, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-modul');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-modul');
        }
    }
}
