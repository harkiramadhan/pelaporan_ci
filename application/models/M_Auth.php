<?php
class M_Auth extends CI_Model{
    
    // Fungsi Autentikasi Login 
    function auth($user,$pass){
        $query = $this->db->get_where('tb_user',['username'=>$user, 'password'=>md5($pass)],1);
        return $query;
    }

    function authws($user,$pass){
        $query = $this->db->get_where('tb_user_ws',['username'=>$user, 'password'=>md5($pass)],1);
        return $query;
    }

    function get_guru($id_guru){
        return $this->db->get_where('tb_guru', ['id'=>$id_guru])->row();
    }

    function get_halaqoh(){
        return $this->db->get('tb_halaqoh');
    }

    function get_santri(){
        return $this->db->get('tb_siswa');
    }

    function get_user(){
        return $this->db->get('tb_user');
    }
}