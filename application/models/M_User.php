<?php
class M_User extends CI_Model{
    function get_user(){
        $this->db->select('tb_user.*, tb_guru.nama');
        $this->db->from('tb_user');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('tb_guru', 'tb_user.id_guru = tb_guru.id');
        return $this->db->get();
    }

    function get_guru(){
        return $this->db->query('SELECT * FROM tb_guru g
            WHERE g.id NOT IN (SELECT tb_user.id_guru FROM tb_user)');
    }

    function cek_username($username){
        return $this->db->get_where('tb_user', ['username'=>$username]);
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
}