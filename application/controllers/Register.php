<?php
use application\models\M_Register;
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   function __construct(){
       parent::__construct();
       $this->load->model('M_Register', 'register'); //panggil model
   }

   public function index() {
    $data = array('title' => 'Halaman Register');
    $this->load->view('templates/auth/v_header', $data);
    $this->load->view('auth/v_register', $data);
    $this->load->view('templates/auth/v_footer', $data);
   }

   public function register()
   {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
    $this->form_validation->set_rules('email','Email','required|trim');
    $this->form_validation->set_rules('jk','Jk','required|trim');
    $this->form_validation->set_rules('hp','Hp','required|trim|numeric');
    $this->form_validation->set_rules('akses','Akses','required|trim');
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/auth/v_header');
        $this->load->view('auth/v_register');
        $this->load->view('templates/auth/v_footer');
    } else {
        $this->register->register();
    }
  }
}