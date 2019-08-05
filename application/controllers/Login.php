<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Auth');
    }

    function index(){
        $this->load->view('login');
    }
    // Fungsi Autentikasi Login 
    function intern(){
        $user   = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $pass   = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $auth   = $this->M_Auth->auth($user,$pass);
        
        if($auth->num_rows() > 0){
            $data = $auth->row_array();
            $this->session->set_userdata('masuk',TRUE);

            if($data['status'] == 'aktif'){
                if($data['role']==1){
                    $this->session->set_userdata('role', $data['role']);
                    $this->session->set_userdata('id_guru', $data['id_guru']);
                    redirect('admin');
                }elseif($data['role']==2){
                    $this->session->set_userdata('role', $data['role']);
                    $this->session->set_userdata('id_guru', $data['id_guru']);
                    redirect('musyrif');
                }
            }else{
                $this->session->set_flashdata('msg', "Hubungi Admin Untuk Mengaktifkan Akun Anda");
                redirect('Login');
            }
        }
        else{
            $this->session->set_flashdata('msg', "Username Atau Password Salah");
            redirect('Login');
        }
    }

    function walisantri(){
        $user   = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $pass   = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $auth   = $this->M_Auth->authws($user,$pass);
        
        if($auth->num_rows() > 0){
            $data = $auth->row_array();
            $this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('id_siswa', $data['id_siswa']);
            $this->session->set_userdata('role', 3);
            redirect('walisantri');
        }else{
            $this->session->set_flashdata('msg', "Username Atau Password Salah");
            redirect('Login');
        }
    }

    // Fungsi Logut
    function logout(){
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}