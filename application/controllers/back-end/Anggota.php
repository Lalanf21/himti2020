<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_controller
{
    private $table = 'tbl_anggota';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti', 'logic');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['anggota'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | anggota';
        $data['konten'] = 'back-end/master_data/list-anggota/v_anggota';
        $this->load->view('back-end/template', $data);
    }

    public function form_add()
    {
        $data['title'] = 'HIMTI | add anggota';
        $data['divisi'] = $this->logic->get_all('tbl_divisi')->result();
        $data['angkatan'] = $this->logic->get_all('tbl_tahun_angkatan')->result();
        $data['minat'] = $this->logic->get_where('tbl_peminatan', ['status' => '1'])->result();
        $data['konten'] = 'back-end/master_data/list-anggota/form_add';
        $this->load->view('back-end/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nim', 'Nim anggota', 'required|trim|numeric|max_length[10]', [
            'required' => 'wajib di isi !',
            'numeric' => 'Hanya boleh angka',
            'max_length' => 'Maksimal 10 karakter'
        ]);
        $this->form_validation->set_rules('nama', 'Nama anggota', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim', [
            'required' => 'Pilih option dahulu !',
        ]);
        $this->form_validation->set_rules('minat', 'Minat', 'required|trim', [
            'required' => 'Pilih option dahulu !',
        ]);
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|trim', [
            'required' => 'Pilih option dahulu !',
        ]);
    }

    public function add()
    {
        $this->_rules();

        if ($this->form_validation->run() === false) {
            $this->form_add();
        } else {
            $nim = htmlspecialchars(htmlentities($this->input->post('nim', true)));
            $nama = htmlspecialchars(htmlentities($this->input->post('nama', true)));
            $divisi = htmlspecialchars(htmlentities($this->input->post('divisi', true)));
            $minat = htmlspecialchars(htmlentities($this->input->post('minat', true)));
            $angkatan = htmlspecialchars(htmlentities($this->input->post('angkatan', true)));
            $foto = $_FILES['foto']['name'];

            if (empty($foto)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih file untuk di upload !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('add-anggota');
            } else {
                $config['upload_path'] = './assets/img/anggota/';
                $config['allowed_types'] = 'jpg|png|gif|bmp';
                $config['max_size'] = '2048';
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/anggota/' . $upload['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '80%';
                    $config['width'] = '95';
                    $config['height'] = '95';
                    $config['new_image'] = './assets/img/anggota/' . $upload['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $upload['file_name'];

                    $data = [
                        'nim' => $nim,
                        'nama_anggota' => $nama,
                        'nama_divisi' => $divisi,
                        'angkatan' => $angkatan,
                        'foto' => $gambar,
                        'minat' => $minat,
                    ];

                    $cek = $this->logic->store($this->table, $data);

                    if ($cek > 0) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil di simpan!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('data-anggota');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data gagal di simpan</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('data-anggota');
                    }
                } else {
                    $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>', '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'));
                    redirect('add-anggota');
                }
            }
        }
    }

    public function form_edit()
    {
        $where = ['id_anggota'=>$this->input->post('id')];
        $data['title'] = 'HIMTI | edit anggota';
        $data['divisi'] = $this->logic->get_all('tbl_divisi')->result();
        $data['anggota'] = $this->logic->get_where($this->table,$where)->row();
        $data['angkatan'] = $this->logic->get_all('tbl_tahun_angkatan')->result();
        $data['minat'] = $this->logic->get_where('tbl_peminatan', ['status' => '1'])->result();
        $data['konten'] = 'back-end/master_data/list-anggota/form_edit';
        $this->load->view('back-end/template', $data);
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id', true)));
        $nim = htmlspecialchars(htmlentities($this->input->post('nim', true)));
        $nama = htmlspecialchars(htmlentities($this->input->post('nama', true)));
        $divisi = htmlspecialchars(htmlentities($this->input->post('divisi', true)));
        $minat = htmlspecialchars(htmlentities($this->input->post('minat', true)));
        $angkatan = htmlspecialchars(htmlentities($this->input->post('angkatan', true)));
        $foto = $_FILES['foto']['name'];

        if ($foto) {
            $fotoLama = $this->logic->query("SELECT foto FROM tbl_anggota WHERE id_anggota = '$id'")->row();
            $config['upload_path'] = './assets/img/anggota/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'assets/img/anggota/' . $fotoLama->foto);

                $upload = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/anggota/' . $upload['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '75%';
                $config['width'] = '95';
                $config['height'] = '95';
                $config['new_image'] = './assets/img/anggota/' . $upload['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $upload['file_name'];

                $this->db->set('foto', $gambar);
            }else{
                $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>', '</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'));
                redirect('data-anggota');
            }
        }
        $data = [
            'nim' => $nim,
            'nama_anggota' => $nama,
            'nama_divisi' => $divisi,
            'angkatan' => $angkatan,
            'minat' => $minat,
        ];

        $where = ['id_anggota'=>$id];
        $cek = $this->logic->update($this->table, $data, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil di update</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('data-anggota');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Gagal di update!!</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('data-anggota');
        }
    
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $fotoLama = $this->logic->query("SELECT foto FROM tbl_anggota WHERE id_anggota = '$id'")->row();
        $where = ['id_anggota' => $id];
        unlink(FCPATH . 'assets/img/anggota/' . $fotoLama->foto);
        $cek = $this->logic->delete($this->table, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-anggota');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-anggota');
        }
    }
}
