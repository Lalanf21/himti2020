<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktural extends CI_controller{
    
    private $table = 'tbl_struktural';

    public function __construct()
	{
		parent::__construct();
        is_logged_in('login');
		$this->load->model('M_himti', 'logic');
	}

	public function index()
	{	
        $data['struktural'] = $this->logic->get_all($this->table)->result();
        $data['anggota'] = $this->logic->get_all('tbl_anggota')->result();
        $data['divisi'] = $this->logic->query("SELECT nama_divisi FROM `tbl_divisi` WHERE nama_divisi != 'ketua' AND nama_divisi !='Wakil ketua'")->result();
        $data['title'] = 'HIMTI | Struktural';
		$data['konten'] = 'back-end/tentang_himti/v_struktural';
		$this->load->view('back-end/template' , $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_anggota', 'Nama anggota', 'alpha_numeric_spaces|trim', [
            'alpha_numeric_spaces' => 'wajib di isi !'
        ]);
        $this->form_validation->set_rules('nama_divisi', 'Nama divisi', 'alpha_numeric_spaces|trim', [
            'alpha_numeric_spaces' => 'wajib di isi !'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|in_list[koordinator,anggota]', [
            'required' => 'wajib di isi !',
            'in_list' => 'silahkan pilih pilihan dahulu !'
        ]);

    }
    
    public function add() { 
        $this->_rules();

        if( $this->form_validation->run() === false ){
            $this->index();
        }else{
            $nama = htmlspecialchars(htmlentities($this->input->post('nama_anggota',true)));
            $divisi = htmlspecialchars(htmlentities($this->input->post('nama_divisi',true)));
            $jabatan = htmlspecialchars(htmlentities($this->input->post('jabatan',true)));

            $data = [
                'nama_anggota'=> $nama,
                'nama_divisi'=> $divisi,
                'jabatan'=> $jabatan,
            ];
            $cek = $this->logic->store($this->table,$data);

            if($cek > 0){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-struktural');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di simpan !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-struktural');
            }
        }
    }

    public function update() {
        $this->_rules();

        if ( $this->form_validation->run() == false ){
            $this->index();
        } else{
            $nama = htmlspecialchars(htmlentities($this->input->post('nama_anggota', true)));
            $divisi = htmlspecialchars(htmlentities($this->input->post('nama_divisi', true)));
            $jabatan = htmlspecialchars(htmlentities($this->input->post('jabatan', true)));
            $id = htmlspecialchars(htmlentities($this->input->post('id', true)));


            $data = [
                'nama_anggota' => $nama,
                'nama_divisi' => $divisi,
                'jabatan' => $jabatan,
            ];
            $where = ['id_struktural' => $id];

            $cek = $this->logic->update($this->table, $data, $where);

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-struktural');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di update !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data-struktural');
            }
        }
    }

    public function delete() { 
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $where = ['id_struktural'=>$id];
        $cek = $this->logic->delete($this->table, $where);

        if($cek > 0){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-struktural');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di hapus !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('data-struktural');
        }
    }
}