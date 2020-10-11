<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Artikel extends CI_controller

{

    private $table = 'tbl_artikel';



    public function __construct()

    {

        parent::__construct();

        is_logged_in('login');

        $this->load->model('M_himti', 'logic');

        $this->load->library('upload');

    }



    public function index()

    {

        $data['artikel'] = $this->logic->get_all($this->table)->result();

        $data['title'] = 'HIMTI | Artikel';

        $data['konten'] = 'back-end/artikel/v_artikel';

        $this->load->view('back-end/template', $data);

    }

    

    public function form_add()

    {

        $data['title'] = 'HIMTI | add Artikel';

        $data['konten'] = 'back-end/artikel/form_add';

        $this->load->view('back-end/template', $data);

    }



    private function _rules()

    {

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [

            'required' => 'wajib di isi !',

        ]);

            

        $this->form_validation->set_rules('publish', 'Publish', 'in_list[1,0]|trim', [

            'in_list' => 'Pilih option dahulu !',

        ]);

    }



    public function add()

    {

        $this->_rules();



        if ($this->form_validation->run() === false) {

            $this->form_add();

        } else {

            $judul = htmlspecialchars(htmlentities($this->input->post('judul', true)));

            $slug1 = htmlspecialchars(htmlentities($this->input->post('slug', true)));

            $slug2 = $slug1.'.html';

            $contents = $this->input->post('contents',true);

            $penulis = htmlspecialchars(htmlentities($this->input->post('penulis', true)));

            $publish = htmlspecialchars(htmlentities($this->input->post('publish', true)));

            $foto = $_FILES['foto']['name'];



            if (empty($foto)) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Silahkan Pilih file untuk di upload !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

                redirect('list-artikel');

            } else {

                $config['upload_path'] = './assets/img/artikel/';

                $config['allowed_types'] = 'jpg|png|gif|bmp';

                $config['max_size'] = '2048';

                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);



                if ($this->upload->do_upload('foto')) {

                    $upload = $this->upload->data();

                    

                    $this->_buat_thumbs($upload['file_name']);



                    $gambar = $upload['file_name'];



                    $data = [

                        'judul' => $judul,

                        'slug' => $slug2,

                        'isi' => $contents,

                        'tanggal' => date('Y-m-d'),

                        'penulis' => $penulis,

                        'gambar' => $gambar,

                        'publish' => $publish,

                    ];

                    unlink(FCPATH.'assets/img/artikel/'.$gambar);



                    $cek = $this->logic->store($this->table, $data);



                    if ($cek > 0) {

                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                        <strong>Data berhasil di simpan!!</strong> 

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                        </div>');

                        redirect('list-artikel');

                    } else {

                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <strong>Data gagal di simpan</strong> 

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                        </div>');

                        redirect('list-artikel');

                    }

                } else {

                    $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <strong>', '</strong> 

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>'));

                    redirect('add-artikel');

                }

            }

        }

    }



    private function _buat_thumbs($nama_file){

        $config = array(

            // Image Large

            array(

                'image_library' => 'GD2',

                'source_image'  => './assets/img/artikel/' . $nama_file,

                'maintain_ratio' => FALSE,

                'width'         => 750,

                'height'        => 500,

                'new_image'     => './assets/img/artikel/large/' . $nama_file

            ),

            // image Medium

            array(

                'image_library' => 'GD2',

                'source_image'  => './assets/img/artikel/' . $nama_file,

                'maintain_ratio' => FALSE,

                'width'         => 650,

                'height'        => 400,

                'new_image'     => './assets/img/artikel/medium/' . $nama_file

            ),

        );



        $this->load->library('image_lib', $config[0]);

        foreach ($config as $item) {

            $this->image_lib->initialize($item);

            if (!$this->image_lib->resize()) {

                return false;

            }

            $this->image_lib->clear();

        }

    }



    public function form_edit()

    {

        $where = ['id_artikel'=>$this->input->post('id')];

        $data['title'] = 'HIMTI | edit artikel';

        $data['artikel'] = $this->logic->get_where($this->table,$where)->row();

        $data['konten'] = 'back-end/artikel/form_edit';

        $this->load->view('back-end/template', $data);

    }



    public function update()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id', true)));

        $judul = htmlspecialchars(htmlentities($this->input->post('judul', true)));

        $contents = $this->input->post('contents', true);

        $publish = htmlspecialchars(htmlentities($this->input->post('publish', true)));

        $foto = $_FILES['foto']['name'];



        if ($foto) {

            $fotoLama = $this->logic->query("SELECT gambar FROM tbl_artikel WHERE id_artikel = '$id'")->row();

            $config['upload_path'] = './assets/img/artikel/';

            $config['allowed_types'] = 'jpg|png|gif|bmp';

            $config['encrypt_name'] = TRUE;

            $config['max_size'] = '2048';

            $this->upload->initialize($config);



            if ($this->upload->do_upload('foto')) {

                $folder = ['medium', 'large'];

                foreach ($folder as $value) {

                    unlink(FCPATH . 'assets/img/artikel/' . $value . '/' . $fotoLama->gambar);

                }

                

                $upload = $this->upload->data();

                

                $this->_buat_thumbs($upload['file_name']);

                $gambar = $upload['file_name'];

                $this->db->set('gambar', $gambar);

            }else{

                $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>', '</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

                </div>'));

                redirect('list-artikel');

            }

        }

        $data = [

            'judul' => $judul,

            'isi' => $contents,

            'publish' => $publish

        ];

        

        

        $where = ['id_artikel'=>$id];

        $cek = $this->logic->update($this->table, $data, $where);

        if ($cek > 0) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                    <strong>Berhasil di update</strong> 

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>');

            redirect('list-artikel');

        }else{

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">

                    <strong>Gagal di update!!</strong> 

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>');

            redirect('list-artikel');

        }

    

    }



    public function delete()

    {

        $id = htmlspecialchars(htmlentities($this->input->post('id')));

        $fotoLama = $this->logic->query("SELECT gambar FROM tbl_artikel WHERE id_artikel = '$id'")->row();

        

        $folder = ['medium','large'];

        foreach ($folder as $value) { 

            unlink(FCPATH . 'assets/img/artikel/'.$value.'/'.$fotoLama->gambar);

        }

        

        

        $where = ['id_artikel' => $id];

        $cek = $this->logic->delete($this->table, $where);



        if ($cek > 0) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">

                <strong>Data berhasil di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('list-artikel');

        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">

                <strong>Data gagal di hapus !</strong> 

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

                </div>');

            redirect('list-artikel');

        }

    }

}

