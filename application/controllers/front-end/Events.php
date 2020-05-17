<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_himti', 'logic');
        $this->load->library('pagination');
        $this->load->helper('text');
    }

    public function index()
    {
        $jumlah = $this->logic->get_where('tbl_events', ['publish' => 1]);
        $page = $this->uri->segment(3);

        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $limit = 3;
        $off = $offset > 0 ? (($offset - 1) * $limit) : $offset;


        // pagination
        $config['base_url'] = base_url() . 'events/page/';
        $config['total_rows'] = $jumlah->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['first_url'] = '1';

        // styling
        $config['full_tag_open'] = '<div class="container"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['attributes']    = ['class' => 'page-link'];

        $config['first_link'] = '<';
        $config['last_link'] = '>';
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $this->pagination->initialize($config);

        $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
        $data['events'] = $this->logic->get_limit('tbl_events', $limit, $off, ['publish' => 1])->result();
        $data['konten'] = 'front-end/events/events-list';
        $this->load->view('front-end/template', $data);
    }

    public function detail($slug)
    {
        $data = $this->logic->get_where('tbl_events', ['slug' => $slug])->result();
        if (!empty($data)) {
            $this->db->query("UPDATE tbl_events SET view = view+1 WHERE slug = '$slug'");

            $data['events'] = $data;
            $data['other_events'] = $this->logic->query("SELECT * FROM tbl_events LIMIT 3")->result();
            $data['value'] = $this->logic->get_all('tbl_home_setting')->row();
            $data['konten'] = 'front-end/events/events-detail';
            $this->load->view('front-end/template', $data);
        } else {
            redirect('events');
        }
    }
}
