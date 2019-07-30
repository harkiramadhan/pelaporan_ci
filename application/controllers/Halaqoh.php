<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Halaqoh extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Admin');
        $this->load->model('M_Halaqoh');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        if($this->session->userdata('role') == 1){
            $guruid                 = $this->session->userdata('id_guru');
            $guru                   = $this->M_Auth->get_guru($guruid);
            $data['title']          = "Data Halaqoh";
            $data['guru']           = $guru;
            $data['halaqoh']        = $this->M_Halaqoh->get_halaqoh()->result();
            $data['list_guru']      = $this->M_Admin->get_guru()->result();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/data_halaqoh', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    function tambah(){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_Halaqoh->tambah_halaqoh();
                $this->session->set_flashdata('sukses', "Halaqoh Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Halaqoh Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function edit($id){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_Halaqoh->edit_halaqoh($id);
                $this->session->set_flashdata('sukses', "Halaqoh Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Halaqoh Gagal Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function delete($id){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_Halaqoh->delete_halaqoh($id);
                $this->session->set_flashdata('sukses', "Halaqoh Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Halaqoh Gagal Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function detail($id){
        if($this->session->userdata('role') == 1){
            $guruid                 = $this->session->userdata('id_guru');
            $guru                   = $this->M_Auth->get_guru($guruid);
            $halaqoh                = $this->M_Halaqoh->get_halaqohid($id)->row();
            $data['title']          = "Halaqoh ".$halaqoh->nama_halaqoh;
            $data['guru']           = $guru;
            $data['halaqoh']        = $halaqoh;
            $data['list_siswa']     = $this->M_Halaqoh->get_siswahalaqoh($id)->result();
            $data['siswa']          = $this->M_Halaqoh->get_siswanotin()->result();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/detail_halaqoh', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    function tambah_siswa(){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                if($this->input->post('id_siswa[]', TRUE) == !NULL){
                    $id_siswa       = $this->input->post('id_siswa[]', TRUE);
                    $id_halaqoh     = $this->input->post('id_halaqoh', TRUE);
                    foreach($id_siswa as $row){
                        $this->M_Halaqoh->tambah_siswa($row,$id_halaqoh);
                    }
                    $this->session->set_flashdata('sukses', "Siswa Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('sukses', "Penambahan Siswa Tidak Ada Perubahan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    function delete_siswa($id){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_Halaqoh->delete_siswa($id);
                $this->session->set_flashdata('sukses', "Siswa Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}