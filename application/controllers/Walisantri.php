<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Walisantri extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Walisantri');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        $idsantri                   = $this->session->userdata('id_siswa');
        $siswa                      = $this->M_Walisantri->get_siswa($idsantri);
        $data['title']              = "Selamat Datang ". $siswa->nama;
        $data['siswa']              = $siswa;
        $data['musyrif']            = $this->M_Walisantri->get_musyrif($idsantri)->row()->nama;
        $data['jum_hafalanbaru']    = $this->M_Walisantri->get_hafalanbaru($idsantri)->num_rows();
        $data['jum_murojaah']       = $this->M_Walisantri->get_murojaah($idsantri)->num_rows();
        
        $this->load->view('layout/header_ws', $data);
        $this->load->view('walisantri/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
}