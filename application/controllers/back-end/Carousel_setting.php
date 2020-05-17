<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel_setting extends CI_controller
{

    private $table = 'tbl_carousel_setting';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti', 'logic');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['carousel'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | Setting';
        $data['konten'] = 'back-end/settings/carousel';
        $this->load->view('back-end/template', $data);
    }

    public function add()
    {
        $foto = $_FILES['foto']['name'];

        if (empty($foto)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih file untuk di upload !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('setting-carousel');
        } else {
            $config['upload_path'] = './assets/img/carousel/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/carousel/' . $upload['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/carousel/' . $upload['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $upload['file_name'];

                $data = ['image' => $gambar];

                $cek = $this->logic->store($this->table, $data);

                if( $cek > 0 ){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil upload!!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('setting-carousel');
                } else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>gagal upload !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('setting-carousel');
                }
            } else {
                $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>', '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'));
                redirect('setting-carousel');
            }
        }
    }

    public function delete() { 
        $id = htmlspecialchars(htmlentities($this->input->post('id', true)));
        $carouselLama = $this->db->query("SELECT image FROM $this->table WHERE id_carousel = '$id'")->row_array();
        unlink(FCPATH.'assets/img/carousel/'.$carouselLama['image']);

        $cek = $this->logic->delete($this->table,['id_carousel'=>$id]);

        if ( $cek > 0 ){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil di hapus !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('setting-carousel');
        } else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>gagal di hapus !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('setting-carousel');
        }
    }

    public function update() {
        $foto = $_FILES['foto']['name'];
        $id = htmlspecialchars(htmlentities($this->input->post('id',true)));
        $carouselLama = $this->db->query("SELECT image FROM $this->table WHERE id_carousel = '$id'")->row_array();
        if (empty($foto)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih file untuk di upload !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('setting-carousel');
        } else {
            $config['upload_path'] = './assets/img/carousel/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'assets/img/carousel/' . $carouselLama['image']);

                $upload = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/carousel/' . $upload['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/carousel/' . $upload['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $upload['file_name'];

                $data = ['image' => $gambar];

                $cek = $this->logic->update($this->table, $data, ['id_Carousel'=>$id]);

                if ($cek > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil upload dan di edit !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('setting-carousel');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>gagal upload dan gagal edit !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('setting-carousel');
                }
            } else {
                $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>', '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'));
                redirect('setting-carousel');
            }
        }
    }
}
