<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }

    private function _user()
    {

        $this->db->select('*');
        return $this->db->from('tb_user')
            ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
            ->get()
            ->row_array();
    }

    public function users()
    {
        $this ->db->select('*');
        return $this->db->from('tb_user');
    }

    public function _jumlah_user()
    {
        return $this->db->count_all('tb_user');
    }


    public function _jumlah_surat()
    {
        return $this->db->count_all('tb_surat');
    }

    public function jumlah_surat_ditolak()
    {
        return $this->db->where('tb_surat.status', '2')->count_all_results('tb_surat');
    }

    public function jumlah_surat_belum_setuju()
    {
        return $this->db->where('tb_surat.status', '0')->count_all_results('tb_surat');
    }

    public function _jumlah_surat_by_id()
    {
        return $this->db->where('tb_surat.nama', $this->session->userdata('nama'))->count_all_results('tb_surat');
    }

    public function index()
    {
        $this->load->library('calendar');
        $session = $this->session->userdata('id');
        if ($this->session->userdata('akses') == 2) {
            $data = array(
                'title' => 'Halaman Utama',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'kontak' => $this->db->get_where('tb_user',['id_user'=> '1'])->row_array(),
                'jumlah_user' => $this->_jumlah_user(),
                'jumlah_surat' => $this->_jumlah_surat_by_id(),
                'kalender' => $this->calendar->generate()
            );
        } else {
            $data = array(
                'title' => 'Halaman Dashboard',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'kontak' => $this->db->get_where('tb_user', ['id_user' => '1'])->row_array(),
                'jumlah_user' => $this->_jumlah_user(),
                'jumlah_surat' => $this->_jumlah_surat(),
                'kalender' => $this->calendar->generate(),
                'jumlah_surat_ditolak' => $this-> jumlah_surat_ditolak(),
                'jumlah_surat_belum_setuju' =>$this-> jumlah_surat_belum_setuju()
            );
        }
        $this->load->view('templates/dashboard/v_header', $data);
        $this->load->view('templates/dashboard/v_navbar', $data);
        $this->load->view('templates/dashboard/v_sidebar', $data);
        $this->load->view('templates/dashboard/v_crumb', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/dashboard/v_footer', $data);
    }
}
        
    /* End of file  Dashboard.php */