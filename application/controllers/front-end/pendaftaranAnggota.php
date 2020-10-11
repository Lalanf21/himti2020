<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pendaftaranAnggota extends CI_controller
{
    private $table = 'tbl_calon_anggota';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_himti', 'logic');
    }

    public function index()
    {
        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['title'] = 'pendaftran calon anggota | HIMTI';
        $data['konten'] = 'front-end/pendaftaran/form_pendaftaran';
        $this->load->view('front-end/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);
        $this->form_validation->set_rules('no_hp', 'no Hp', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeri' => 'masukkan angka !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Wajib di isi !',
            'valid_email' => 'Alamat email tidak valid'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim|numeric', [
            'required' => 'Pilih option dahulu !',
            'numeric' => 'Pilih option dahulu !',
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Wajib di isi !',
        ]);
    }

    public function add()
    {
        $this->_rules();

        if ($this->form_validation->run() === false) {
            $this->index();
        }else{
            $nama = htmlspecialchars(htmlentities($this->input->post('nama', true)));
            $no_hp = htmlspecialchars(htmlentities($this->input->post('no_hp', true)));
            $email = htmlspecialchars(htmlentities($this->input->post('email', true)));
            $semester = htmlspecialchars(htmlentities($this->input->post('semester', true)));
            $kelas = htmlspecialchars(htmlentities($this->input->post('kelas', true)));

            $data = [
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,
                'semester' => $semester,
                'kelas' => $kelas,
            ];

            $validasi = $this->logic->get_where($this->table, $data)->num_rows();
            if ($validasi > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda sudah terdaftar !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pendaftaran-calon-anggota');
            } else{
               $cek = $this->logic->store($this->table, $data);

            if ($cek > 0) {
                $this->_sendEmail($email, $nama, $no_hp, $semester, $kelas);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pendaftaran berhasil, silahkan cek email !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pendaftaran-calon-anggota');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Nama anda sudah terdaftar</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('pendaftaran-calon-anggota');
            } 
         }   
        }
    }

    private function _sendEmail($email, $nama, $no_hp, $semester, $kelas)

    {

        $config = [

            'protocol'  =>'smtp',

            'smtp_host' =>'mail.himti-umt.org',

            'smtp_port' => '587',

            'smtp_user' =>'humas@himti-umt.org',

            'smtp_pass' =>'Humas2020',

            'mailtype'  =>'html',

            'charset'   =>'utf-8'

        ];

        $this->load->library('email', $config);

        $this->email->initialize($config); 

        $this->email->set_newline("\r\n");

        $this->email->from('humas@himti-umt.org', 'Pendaftaran anggota HIMTI '); 

        $this->email->to( $email );

        $this->email->subject('Pendaftaran Calon anggota HIMTI-UMT '); 

        $data = [
            'peserta'=>$nama,
            'email' => $email,
            'no_hp'=> $no_hp,
            'kelas' => $kelas,
            'semester'=> $semester
        ];

        $this->email->message($this->load->view('front-end/pendaftaran/v_email',$data, TRUE));

        $cek = $this->email->send();

        if ( $cek ) {
            return true;
        } else { 
            $this->session->set_flashdata('pesan', $this->email->print_debugger('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'));
            redirect('pendaftaran-calon-anggota');
        }
}
}