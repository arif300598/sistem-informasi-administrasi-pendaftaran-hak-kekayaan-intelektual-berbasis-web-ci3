<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat extends CI_Model
{
    public function get_jenispermohonan()
    {
        $query =$this->db->query("SELECT * FROM tb_jenis_permohonan");
        return $query->result();
    }


    public function get_subCiptaan()
    {
        $query = $this->db->query("SELECT * FROM tb_sub_ciptaan");
        return $query -> result();
    }

    public function getSuratBelumSetujui()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
            //->join('tb_user', 'tb_surat.nama=tb_user.nama')
            ->join('tb_pemegang_hki', 'tb_surat.nama_pemegang=tb_pemegang_hki.nama_pemegang')
            ->where('tb_surat.status', '0')
            ->get()
            ->result();
    }

    public function getSetuju()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
           // ->join('tb_user', 'tb_surat.nama=tb_user.nama')
            ->join('tb_pemegang_hki', 'tb_surat.nama_pemegang=tb_pemegang_hki.nama_pemegang')
            ->where('tb_surat.status', '1')
            ->get()
            ->result();
    }

    public function getTolakSurat()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
           // ->join('tb_user', 'tb_surat.nama=tb_user.nama')
            ->join('tb_pemegang_hki', 'tb_surat.nama_pemegang=tb_pemegang_hki.nama_pemegang')
            ->where('tb_surat.status', '2')
            ->get()
            ->result();
    }

    public function getAllSurat()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
            ->join('tb_user', 'tb_surat.nama=tb_user.nama')
            ->join('tb_pemegang_hki', 'tb_surat.nama_pemegang=tb_pemegang_hki.nama_pemegang')
            ->get()
            ->result();
    }

    public function getSuratById()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
            ->join('tb_user', 'tb_surat.nama=tb_user.nama')
            ->join('tb_pemegang_hki', 'tb_surat.nama_pemegang=tb_pemegang_hki.nama_pemegang')
            ->where('tb_surat.nama', $this->session->userdata('nama'))
            ->get()
            ->result();
    }

    public function kirimSurat()
    {
        $filename = "";
        $filename1 = "";
        $filename2 = "";
        $filename3 = "";
        $filename4 = "";
        $filename5 = "";
        $filename6 = "";

       

        $config['upload_path']          = './aset/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5072; // 5MB
		$this->load->library('upload', $config);
        $this->upload->initialize($config);

        //sku
            // if ( !$this->upload->do_upload('sku')){
            // 	$error = array('title' => $this->upload->display_errors());
            //     $this->load->view('surat/v_kirim', $error);
            //     print_r($error);
            // }else{
            // 	$data1 = array('title' => $this->upload->data());
            //     print_r($data1);
            //     $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            //     $filename = $upload_data['file_name'];
            // }
            
            //npwp
            
            // if ( !$this->upload->do_upload('npwp')){
            // 	$error = array('title' => $this->upload->display_errors());
            //     $this->load->view('surat/v_kirim', $error);
            //     print_r($error);
            // }else{
            // 	$data1 = array('title' => $this->upload->data());
            //     print_r($data1);
            //     $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            //     $filename1 = $upload_data['file_name'];
            // }
            
            //contoh_ciptaan
            if ( !$this->upload->do_upload('contoh_ciptaan')){
            	$error = array('title' => $this->upload->display_errors());
                $this->load->view('surat/v_kirim', $error);
                print_r($error);
            }else{
            	$data1 = array('title' => $this->upload->data());
                print_r($data1);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $filename2 = $upload_data['file_name'];
            }
            
            //surat_pernyataan
            // if ( !$this->upload->do_upload('surat_pernyataan')){
            // 	$error = array('title' => $this->upload->display_errors());
            //     $this->load->view('surat/v_kirim', $error);
            //     print_r($error);
            // }else{
            // 	$data1 = array('title' => $this->upload->data());
            //     print_r($data1);
            //     $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            //     $filename3 = $upload_data['file_name'];
            // }
            
            //bukti_pengalihan
            if ( !$this->upload->do_upload('bukti_pengalihan')){
            	$error = array('title' => $this->upload->display_errors());
                $this->load->view('surat/v_kirim', $error);
                print_r($error);
            }else{
            	$data1 = array('title' => $this->upload->data());
                print_r($data1);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $filename4 = $upload_data['file_name'];
            }

            //ktp
            if ( !$this->upload->do_upload('bukti_pengalihan')){
            	$error = array('title' => $this->upload->display_errors());
                $this->load->view('surat/v_kirim', $error);
                print_r($error);
            }else{
            	$data1 = array('title' => $this->upload->data());
                print_r($data1);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $filename4 = $upload_data['file_name'];
            }

            //data_pencipta
            if ( !$this->upload->do_upload('data_pencipta')){
            	$error = array('title' => $this->upload->display_errors());
                $this->load->view('surat/v_kirim', $error);
                print_r($error);
            }else{
            	$data1 = array('title' => $this->upload->data());
                print_r($data1);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $filename6 = $upload_data['file_name'];
            }
            
            //bukti_pembayaran
            /*if ( !$this->upload->do_upload('bukti_pembayaran')){
            	$error = array('title' => $this->upload->display_errors());
                $this->load->view('surat/v_kirim', $error);
                print_r($error);
            }else{
            	$data1 = array('title' => $this->upload->data());
                print_r($data1);
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $filename5 = $upload_data['file_name'];
            }*/
            
                  //tb_surat
                   $data2 = array(
                       'nama_pemegang' => $this->input->post('nama_pemegang', true),
                       'hari_tanggal' => $this->input->post('ht', true),
                       'nama_jenis_permohonan' => $this->input->post('nama_jenis_permohonan', true),
                       'judul' => $this->input->post('judul', true),
                       'deskripsi' => $this->input->post('deskripsi', true),
                      // 'sku' => $filename,
                     //  'npwp' => $filename1,
                       'ktp' => $filename5,
                       'contoh_ciptaan' => $filename2,
                     //  'surat_pernyataan' => $filename3,
                       'bukti_pengalihan' => $filename4,
                       'data_pencipta' => $filename6,
                       'contoh_link' => $this->input->post('contoh_link', true),
                       'nama_sub' => $this->input->post('nama_sub', true),
                       'nama' => $this->input->post('nama',true),
                       'status' => 0,
                         );
                    

                    
                    //tb_pemegang_hki
                    $data5 = array(
            
                        'nama_pemegang' => $this->input->post('nama_pemegang', true),
                        'kecamatan' => $this->input->post('kecamatan', true),
                        'alamat_pemegang' => $this->input->post('alamat_pemegang', true),
                        'kode_pos_pemegang' => $this->input->post('kode_pos_pemegang',true),
                        'kota_pemegang' => $this->input->post('kota_pemegang', true),
                        'provinsi_pemegang' => $this->input->post('provinsi_pemegang', true),
                        'email_pemegang' => $this->input->post('email_pemegang', true),
                        'no_tlp_pemegang' => $this->input->post('no_tlp_pemegang', true), 
                    );
            

                   $this->db->insert('tb_surat', $data2);
                  
                   $this->db->insert('tb_pemegang_hki', $data5);
                   $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Dikirim</div>');
                  redirect('dashboard');                 
        }

        public function hapusPemegang()
        {
           $this->db->where('id_pemegang', $this->input->get('id_pemegang'));
           $this->db->delete('tb_pemegang_hki');
           $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Hapus</div>');
           redirect('surat/kirim');
        }

        

    public function hapusSurat()
    {
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->delete('tb_surat');

        $this->db->where('nama_pemegang', $this->input->get('nama_pemegang'));
           $this->db->delete('tb_pemegang_hki');

        
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Hapus</div>');
        redirect('surat');
    }

    


    public function setujuSurat()
    {
        $data = array(
            'status' => 1
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Disetujui</div>');
        redirect('surat');
    }

    public function tolakSurat()
    {
        $data = array(
            'status' => 2,
            
        );
        
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat ditolak</div>');
        redirect('surat');
    }

    public function batalSurat()
    {
        $data = array(
            'status' => 0,
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Dibatalkan</div>');
        redirect('surat');
    }

    public function dokumenProses()
    {
        $data = array(
            'status' => 3
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Dokumen Dalam Proses</div>');
        redirect('surat');
    }

}                    
/* End of file M_Surat.php */