<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    public function cek_user($user){
        $this->db->where('nim',$user);
        $this->db->where('status',1);
        $this->db->or_where('nama_anggota',$user);
        return $this->db->get('tbl_pengguna');
    }

    public function cek_pass($pass, $cek){
        return password_verify($pass, $cek);
    }
}