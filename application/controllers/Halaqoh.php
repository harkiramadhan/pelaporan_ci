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
            $data['title']          = "Data Halaqoh";
            $data['guru']           = $guru;
            $data['halaqoh']        = $this->M_Halaqoh->get_halaqoh()->result();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/data_halaqoh', $data);
            $this->load->view('layout/footer', $data);
        }
    }
}