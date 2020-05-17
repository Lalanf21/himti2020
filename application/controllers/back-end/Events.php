<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_controller
{
    private $table = 'tbl_events';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti', 'logic');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['events'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | events';
        $data['konten'] = 'back-end/events/v_events';
        $this->load->view('back-end/template', $data);
    }
    
    public function form_add()
    {
        $data['title'] = 'HIMTI | add Events';
        $data['konten'] = 'back-end/events/form_add';
        $this->load->view('back-end/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('events', 'Events', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('waktu', 'Waktu', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('kuota', 'Kuota', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Hanya angka !',
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Hanya angka !',
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
            $events = htmlspecialchars(htmlentities($this->input->post('events', true)));
            $tanggal = htmlspecialchars(htmlentities($this->input->post('tanggal', true)));
            $contents = $this->input->post('contents',true);
            $waktu = htmlspecialchars(htmlentities($this->input->post('waktu', true)));
            $slug = htmlspecialchars(htmlentities($this->input->post('slug', true)));
            $slug2 = $slug . '.html';
            $tempat = htmlspecialchars(htmlentities($this->input->post('tempat', true)));
            $kuota = htmlspecialchars(htmlentities($this->input->post('kuota', true)));
            $harga = htmlspecialchars(htmlentities($this->input->post('harga', true)));
            $publish = htmlspecialchars(htmlentities($this->input->post('publish', true)));
            $foto = $_FILES['foto']['name'];

            if (empty($foto)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih file untuk di upload !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('list-events');
            } else {
                $config['upload_path'] = './assets/img/events/';
                $config['allowed_types'] = 'jpg|png|gif|bmp';
                $config['max_size'] = '2048';
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload = $this->upload->data();
                    
                    $this->_buat_thumbs($upload['file_name']);

                    $gambar = $upload['file_name'];

                    $data = [
                        'nama_events' => $events,
                        'slug' => $slug2,
                        'tanggal' => $tanggal,
                        'deskripsi' => $contents,
                        'gambar' => $gambar,
                        'waktu' => $waktu,
                        'tempat' => $tempat,
                        'kuota' => $kuota,
                        'harga' => $harga,
                        'publish' => $publish,
                    ];
                    unlink(FCPATH.'assets/img/events/'.$gambar);

                    $cek = $this->logic->store($this->table, $data);

                    if ($cek > 0) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil di simpan!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('list-events');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data gagal di simpan</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('list-events');
                    }
                } else {
                    $this->session->set_flashdata('pesan', $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>', '</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'));
                    redirect('add-events');
                }
            }
        }
    }

    private function _buat_thumbs($nama_file){
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/events/' . $nama_file,
                'maintain_ratio' => FALSE,
                'width'         => 1150,
                'height'        => 1000,
                'new_image'     => './assets/img/events/large/' . $nama_file
            ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/events/' . $nama_file,
                'maintain_ratio' => FALSE,
                'width'         => 650,
                'height'        => 300,
                'new_image'     => './assets/img/events/medium/' . $nama_file
            ),
            // image small
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/events/' . $nama_file,
                'maintain_ratio' => FALSE,
                'width'         => 100,
                'height'        => 100,
                'new_image'     => './assets/img/events/small/' . $nama_file
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
        $where = ['id_events'=>$this->input->post('id')];
        $data['title'] = 'HIMTI | edit events';
        $data['events'] = $this->logic->get_where($this->table,$where)->row();
        $data['konten'] = 'back-end/events/form_edit';
        $this->load->view('back-end/template', $data);
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id', true)));

        $events = htmlspecialchars(htmlentities($this->input->post('events', true)));
        $tanggal = htmlspecialchars(htmlentities($this->input->post('tanggal', true)));
        $contents = $this->input->post('contents', true);
        $waktu = htmlspecialchars(htmlentities($this->input->post('waktu', true)));
        $tempat = htmlspecialchars(htmlentities($this->input->post('tempat', true)));
        $kuota = htmlspecialchars(htmlentities($this->input->post('kuota', true)));
        $harga = htmlspecialchars(htmlentities($this->input->post('harga', true)));
        $publish = htmlspecialchars(htmlentities($this->input->post('publish', true)));
        $foto = $_FILES['foto']['name'];

        if ($foto) {
            $fotoLama = $this->logic->query("SELECT gambar FROM tbl_events WHERE id_events = '$id'")->row();
            $config['upload_path'] = './assets/img/events/';
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $folder = ['small','medium', 'large'];
                foreach ($folder as $value) {
                    unlink(FCPATH . 'assets/img/events/' . $value . '/' . $fotoLama->gambar);
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
                redirect('list-events');
            }
        }
        $data = [
            'nama_events' => $events,
            'tanggal' => $tanggal,
            'deskripsi' => $contents,
            'waktu' => $waktu,
            'tempat' => $tempat,
            'kuota' => $kuota,
            'harga' => $harga,
            'publish' => $publish,
        ];
        
        $where = ['id_events'=>$id];
        $cek = $this->logic->update($this->table, $data, $where);
        unlink(FCPATH . 'assets/img/events/' . $gambar);
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil di update</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('list-events');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Gagal di update!!</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('list-events');
        }
    
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $fotoLama = $this->logic->query("SELECT gambar FROM tbl_events WHERE id_events = '$id'")->row();
        
        $folder = ['small','medium','large'];
        foreach ($folder as $value) { 
            unlink(FCPATH . 'assets/img/events/'.$value.'/'.$fotoLama->gambar);
        }
        
        
        $where = ['id_events' => $id];
        $cek = $this->logic->delete($this->table, $where);

        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-events');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('list-events');
        }
    }
}
