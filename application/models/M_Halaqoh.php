<?php
class M_Halaqoh extends CI_Model{
    function get_halaqoh(){
        $this->db->select('tb_halaqoh.*, tb_guru.nama');
        $this->db->from('tb_guru');
        $this->db->join('tb_halaqoh', 'tb_guru.id = tb_halaqoh.id_guru');
        return $this->db->get();
    }

    function tambah_halaqoh(){
        $data = [
            'id_guru'       => $this->input->post('id_guru', TRUE),
            'nama_halaqoh'  => $this->input->Post('nama_halaqoh', TRUE)
        ];
        $this->db->insert('tb_halaqoh', $data);
    }

    function edit_halaqoh($id){
        $data = [
            'id_guru'       => $this->input->post('id_guru', TRUE),
            'nama_halaqoh'  => $this->input->Post('nama_halaqoh', TRUE)
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_halaqoh', $data);
    }

    function delete_halaqoh($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_halaqoh');
    }

    function get_halaqohid($id){
        $this->db->select('tb_halaqoh.*, tb_guru.nama');
        $this->db->from('tb_guru');
        $this->db->join('tb_halaqoh', 'tb_guru.id = tb_halaqoh.id_guru');
        $this->db->where(['tb_halaqoh.id'=>$id]);
        return $this->db->get();
    }

    function get_siswanotin(){
        return $this->db->query('SELECT * FROM tb_siswa s
            WHERE s.id NOT IN (SELECT tb_halaqoh_detail.id_siswa FROM tb_halaqoh_detail)');
    }

    function get_siswahalaqoh($id){
        $this->db->select('tb_halaqoh_detail.*, tb_siswa.nama');
        $this->db->from('tb_halaqoh_detail');
        $this->db->join('tb_siswa', 'tb_halaqoh_detail.id_siswa = tb_siswa.id');
        $this->db->where(['tb_halaqoh_detail.id_halaqoh'=>$id]);
        return $this->db->get();
    }

    function tambah_siswa($id_siswa,$id_halaqoh){
        $data = [
            'id_siswa'      => $id_siswa,
            'id_halaqoh'    => $id_halaqoh
        ];
        $this->db->insert('tb_halaqoh_detail', $data);
    }

    function delete_siswa($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_halaqoh_detail');
    }
}