<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Murojaah extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Musyrif');
        $this->load->model('M_Walisantri');
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect ($url);
        }
    }

    function index(){
        if($this->session->userdata('role') == 2){
            $guruid                 = $this->session->userdata('id_guru');
            $guru                   = $this->M_Auth->get_guru($guruid);
            $data['title']          = "Murojaah";
            $data['guru']           = $guru;
            $data['siswa']          = $this->M_Musyrif->get_santrihalaqoh($guruid)->result();
            $data['murojaah']       = $this->M_Musyrif->get_murojaah($guruid)->result();
            $get                    = file_get_contents("https://al-quran-8d642.firebaseio.com/data.json?print=pretty");
            $data['surat']          = json_decode($get, TRUE);

            $this->load->view('layout/header_musyrif', $data);
            $this->load->view('musyrif/murojaah', $data);
            $this->load->view('layout/footer', $data);
        }elseif($this->session->userdata('role') ==3){
            $idsantri                   = $this->session->userdata('id_siswa');
            $siswa                      = $this->M_Walisantri->get_siswa($idsantri);
            $data['title']              = "Selamat Datang ". $siswa->nama;
            $data['siswa']              = $siswa;
            $data['murojaah']           = $this->M_Walisantri->get_murojaah($idsantri)->result();
            $get                        = file_get_contents("https://al-quran-8d642.firebaseio.com/data.json?print=pretty");
            $data['surat']              = json_decode($get, TRUE);

            $this->load->view('layout/header_ws', $data);
            $this->load->view('walisantri/murojaah', $data);
            $this->load->view('layout/footer', $data);
        }
    }

    function tambah(){
        $guruid         = $this->session->userdata('id_guru');
        $idhalaqoh      = $this->db->get_where('tb_halaqoh', ['id_guru'=>$guruid])->row()->id;
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($this->session->userdata('role') == 2){
            if($this->method == "POST"){
                $this->M_Musyrif->tambah_murojaah($idhalaqoh);
                $this->session->set_flashdata('sukses', "Murojaah Berhasil Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } 
    }

    function edit($id){
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($this->session->userdata('role') == 2){
            if($this->method == "POST"){
                $this->M_Musyrif->edit_murojaah($id);
                $this->session->set_flashdata('sukses', "Murojaah Berhasil Di Edit");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } 
    }

    function delete($id){
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($this->session->userdata('role') == 2){
            if($this->method == "POST"){
                $this->M_Musyrif->delete_murojaah($id);
                $this->session->set_flashdata('sukses', "Murojaah Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } 
    }

}