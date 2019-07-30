<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_User');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        if($this->session->userdata('role') == 1){
            $guruid                 = $this->session->userdata('id_guru');
            $guru                   = $this->M_Auth->get_guru($guruid);
            $data['title']          = "Data User";
            $data['guru']           = $guru;
            $data['user']           = $this->M_User->get_user()->result();
            $data['list_guru']      = $this->M_User->get_guru()->result();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/data_user', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    function tambah(){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $username   = $this->input->post('username', TRUE);
                $cek        = $this->M_User->cek_username($username)->result();
                if($cek == TRUE){
                    $this->session->set_flashdata('error', "Username Sudah Tersedia");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->M_User->tambah();
                    $this->session->set_flashdata('sukses', "User Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "User Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function edit($id){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_User->edit($id);
                $this->session->set_flashdata('sukses', "User Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function delete($id){
        if($this->session->userdata('role') == 1){
            $this->method = $_SERVER['REQUEST_METHOD'];
            if($this->method == "POST"){
                $this->M_User->delete($id);
                $this->session->set_flashdata('sukses', "User Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}