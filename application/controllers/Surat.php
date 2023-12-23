<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_Surat', 'surat');
    }

    public function _jumlah_surat()
    {
        return $this->db->count_all('tb_surat');
    }

    public function _jumlah_surat_by_id()
    {
        return $this->db->where('tb_surat.nama', $this->session->userdata('nama'))->count_all_results('tb_surat');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 2) {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Data Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getSuratById(),
                
                'jumlah_surat' => $this->_jumlah_surat_by_id(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Data Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getAllSurat(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    
    
    public function kirim()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Kirim Permohonan',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_surat' => $this->_jumlah_surat_by_id(),
                'data_subCiptaan' => $this->surat->get_subCiptaan(),
                'data_jenis_permohonan' => $this->surat->get_jenispermohonan(),
            );
            $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('surat/v_kirim', $data);
                $this->load->view('templates/dashboard/v_footer', $data);
                
                
            } else {
                $this->surat->kirimSurat();
            }
        }
    }

    public function lihat()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Lihat Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            if ($this->form_validation->run() == false){
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_lihat', $data);
            $this->load->view('templates/dashboard/v_footer');
            }
            else{
                $this->pengguna->tolakSurat();
            }
        }
    }

    public function tambahpemegang()
    {
        $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Tambah Pemegang Hak Cipta',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                
            );
            $this->form_validation->set_rules('nama', 'Nama Pemohon', 'required|trim');
            $this->form_validation->set_rules('nama_pemegang', 'Nama Pemegang', 'required|trim');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
            $this->form_validation->set_rules('alamat_pemegang', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('kode_pos_pemegang', 'Kode Pos', 'required|trim');
            $this->form_validation->set_rules('kota_pemegang', 'Kota', 'required|trim');
            $this->form_validation->set_rules('provinsi_pemegang', 'Provinsi', 'required|trim');
            $this->form_validation->set_rules('email_pemegang', 'Email', 'required|trim');
            $this->form_validation->set_rules('no_tlp_pemegang', 'Nomor Telephone', 'required|trim');
            if($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_tambahpemegang', $data);
            $this->load->view('templates/dashboard/v_footer');
            }else{
                $this->surat->tambahPemegang();
            }
    }

    public function belumdisetujui()
    {
        $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Permohonan Belum di setujui',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getSuratBelumSetujui(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_belumsetujui', $data);
            $this->load->view('templates/dashboard/v_footer');
    }
    

    public function suratdisetujui()
    {
        $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Permohonan di setujui',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getSetuju(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_setuju', $data);
            $this->load->view('templates/dashboard/v_footer');
    }

    public function surat_tolak()
    {
        $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Permohonan ditolak',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getTolakSurat(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_tolak', $data);
            $this->load->view('templates/dashboard/v_footer');
    }


    public function hapuspemegang()
    {
        $this->surat->hapusPemegang();
    }

    public function hapus()
    {
        $this->surat->hapusSurat();
    }

    public function setuju()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->setujuSurat();
        }
    }

    public function tolak()
    {
        if($this->session->userdata('akses') == 2){
            redirect('dashboard');
        } else {
            $this->surat->tolakSurat();
        }
    }

    public function batal()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->batalSurat();
        }
    }

    public function dokumenProses()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->dokumenProses();
        }
    }

} /* End of file  Surat.php */

        