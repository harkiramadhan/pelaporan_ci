<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
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
            $data['title']          = "Data User";
            $data['guru']           = $guru;
            $data['user']           = $this->M_Auth->get_user()->result();

            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/data_user', $data);
            $this->load->view('layout/footer', $data);
        }
    }
}