<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Register extends CI_Model{

    function register()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'jk' => $this->input->post('jk', true),
            'hp' => $this->input->post('hp', true),
            'akses' => $this->input->post('akses', true),
            'dibuat' => time(),
        ];
        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Ditambahkan</div>');
        redirect('pengguna');
    }
}