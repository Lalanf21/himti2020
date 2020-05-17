<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubahpass extends CI_controller
{
    private $table = 'tbl_pengguna';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti', 'logic');
    }

    public function index()
    {
        $data['tahun'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'HIMTI | Ganti password';
        $data['konten'] = 'back-end/ubah_password/v_ubah_pass';
        $this->load->view('back-end/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('password_lama', 'Password lama', 'required|trim', [
            'required' => 'Harus Di isi !'
        ]);
        $this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Harus Di isi !',
            'min_length' => 'Password terlalu pendek !',
            'matches' => 'Password Tidak Sama'
        ]);
        $this->form_validation->set_rules('password_baru2', 'ulangi password', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Harus Di isi !',
            'min_length' => 'Password terlalu pendek !',
            'matches' => 'Password Tidak Sama'
        ]);
    }

    public function update_pass() { 
        $nama = $this->session->userdata('nama');
        $cekPassLama = $this->logic->get_where($this->table,['nama_anggota'=>$nama])->row();
        // var_dump($cekPassLama);die;

        $this->_rules();
        if ($this->form_validation->run() == false){
            $this->index();
        }else {
            $passLama = $this->input->post('password_lama');
            $passBaru = $this->input->post('password_baru1');
            
            if( password_verify($passLama,$cekPassLama->password) ){
                $password_hash = password_hash($passBaru,PASSWORD_DEFAULT);
                $data = ['password'=>$password_hash];
                $where = ['nama_anggota'=>$nama];

                $cek = $this->logic->update($this->table,$data,$where);

                if($cek > 0){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Password berhasil di ganti!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('dashboard');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password gagal di ubah!!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('dashboard');
                }
                
            }

        }
    }

    
}
