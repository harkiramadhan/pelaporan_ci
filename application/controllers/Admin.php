<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Admin');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        if($this->session->userdata('role') == 1){
            $guruid                 = $this->session->userdata('id_guru');
            $guru                   = $this->M_Auth->get_guru($guruid);
            $data['title']          = "Selamat Datang ".$guru->nama;
            $data['guru']           = $guru;
            $data['jum_halaqoh']    = $this->M_Auth->get_halaqoh()->num_rows();
            $data['jum_santri']     = $this->M_Auth->get_santri()->num_rows();
            $data['jum_user']       = $this->M_Auth->get_user()->num_rows();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/dash', $data);
            $this->load->view('layout/footer', $data);
        }
    }
}