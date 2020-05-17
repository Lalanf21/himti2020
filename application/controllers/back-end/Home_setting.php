<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_setting extends CI_controller{

    private $table = 'tbl_home_setting';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('M_himti','logic');
    }

    public function index(){
        $data['value'] = $this->logic->get_all($this->table)->row();
        $data['title'] = 'HIMTI | Setting';
        $data['konten'] = 'back-end/settings/home';
        $this->load->view('back-end/template',$data);
    }

    public function update(){
        $this->form_validation->set_rules('textWelcome','text Welcome','required|trim');
        $this->form_validation->set_rules('aboutMessage','text about','required|trim');
        $this->form_validation->set_rules('sosmed_fb','url sosmed fb','required|trim');
        $this->form_validation->set_rules('sosmed_ig','url sosmed ig','required|trim');
        $this->form_validation->set_rules('sosmed_yt','url sosmed yt','required|trim');
        $this->form_validation->set_rules('sosmed_email','url sosmed email','required|trim');

        if( $this->form_validation->run() == false ){
            $this->index();
        }else{
            $id = htmlspecialchars(htmlentities($this->input->post('id',true)));
            $about = htmlspecialchars(htmlentities($this->input->post('aboutMessage',true)));
            $message = htmlspecialchars(htmlentities($this->input->post('textWelcome',true)));
            $fb = htmlspecialchars(htmlentities($this->input->post('sosmed_fb',true)));
            $ig = htmlspecialchars(htmlentities($this->input->post('sosmed_ig',true)));
            $yt = htmlspecialchars(htmlentities($this->input->post('sosmed_yt',true)));
            $email = htmlspecialchars(htmlentities($this->input->post('sosmed_email',true)));
            $data = [
                'id_home_setting' => $id,
                'welcome_message' => $message,
                'about_message' => $about,
                'link_yt'=> $yt,
                'link_ig'=> $ig,
                'link_email'=> $email,
                'link_fb'=> $fb
            ];
            $where = ['id_home_setting'=>$id];
            
            $cek = $this->logic->update($this->table,$data, $where);

            if($cek > 0){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di update !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('setting-home');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal di edit !!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('setting-home');
            }
        }
    }
}