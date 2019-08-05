<?php
class M_User extends CI_Model{
    function get_user(){
        $this->db->select('tb_user.*, tb_guru.nama');
        $this->db->from('tb_user');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('tb_guru', 'tb_user.id_guru = tb_guru.id');
        return $this->db->get();
    }

    function get_userws(){
        $this->db->select('tb_user_ws.*, tb_siswa.nama');
        $this->db->from('tb_user_ws');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('tb_siswa', 'tb_user_ws.id_siswa = tb_siswa.id');
        return $this->db->get();
    }

    function get_guru(){
        return $this->db->query('SELECT * FROM tb_guru g
            WHERE g.id NOT IN (SELECT tb_user.id_guru FROM tb_user)');
    }

    function get_siswa(){
        return $this->db->query('SELECT * FROM tb_siswa s
            WHERE s.id NOT IN (SELECT tb_user_ws.id_siswa FROM tb_user_ws)');
    }

    function get_allsiswa(){
        return $this->db->get('tb_siswa');
    }

    function cek_username($username){
        return $this->db->get_where('tb_user', ['username'=>$username]);
    }

    function cek_usernamews($username){
        return $this->db->get_where('tb_user_ws', ['username'=>$username]);
    }

    function tambah(){
        $data = [
            'id_guru'   => $this->input->post('id_guru',TRUE),
            'username'  => $this->input->post('username',TRUE),
            'password'  => md5($this->input->post('password', TRUE)),
            'role'      => $this->input->post('role',TRUE),
            'status'    => $this->input->post('status', TRUE)
        ];
        $this->db->insert('tb_user', $data);
    }

    function edit($id){
        if($this->input->post('password', TRUE) == TRUE){
            $data = [
                'id_guru'   => $this->input->post('id_guru',TRUE),
                'username'  => $this->input->post('username',TRUE),
                'password'  => md5($this->input->post('password', TRUE)),
                'role'      => $this->input->post('role',TRUE),
                'status'    => $this->input->post('status', TRUE)
            ];
        }else{
            $data = [
                'id_guru'   => $this->input->post('id_guru',TRUE),
                'username'  => $this->input->post('username',TRUE),
                'role'      => $this->input->post('role',TRUE),
                'status'    => $this->input->post('status', TRUE)
            ];
        }
        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

    function tambahws(){
        $data = [
            'id_siswa'  => $this->input->post('id_siswa',TUE),
            'username'  => $this->input->post('username',TRUE),
            'password'  => md5($this->input->post('password', TRUE)),
            'status'    => $this->input->post('status', TRUE)
        ];
        $this->db->insert('tb_user_ws', $data);
    }

    function editws($id){
        if($this->input->post('password', TRUE) == TRUE){
            $data = [
                'id_siswa'  => $this->input->post('id_siswa',TRUE),
                'username'  => $this->input->post('username',TRUE),
                'password'  => md5($this->input->post('password', TRUE)),
                'status'    => $this->input->post('status', TRUE)
            ];
        }else{
            $data = [
                'id_siswa'  => $this->input->post('id_siswa',TRUE),
                'username'  => $this->input->post('username',TRUE),
                'status'    => $this->input->post('status', TRUE)
            ];
        }
        $this->db->where('id', $id);
        $this->db->update('tb_user_ws', $data);
    }

    function deletews($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_user_ws');
    }
}