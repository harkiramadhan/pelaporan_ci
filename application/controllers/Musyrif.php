<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Musyrif extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Musyrif');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        $guruid                     = $this->session->userdata('id_guru');
        $guru                       = $this->M_Auth->get_guru($guruid);
        $data['title']              = "Selamat Datang ".$guru->nama;
        $data['guru']               = $guru;
        $data['jum_santri']         = $this->M_Musyrif->get_santrihalaqoh($guruid)->num_rows();
        $data['jum_hafalanbaru']    = $this->M_Musyrif->get_hafalanbaru($guruid)->num_rows();
        $data['jum_murojaah']       = $this->M_Musyrif->get_murojaah($guruid)->num_rows();

        // print_r($data['jum_santri']);
        $this->load->view('layout/header_musyrif', $data);
        $this->load->view('musyrif/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }

}