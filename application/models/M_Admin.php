<?php
class M_Admin extends CI_Model{

    function get_santri(){
        $this->db->select('tb_siswa.nama, tb_halaqoh.nama_halaqoh');
        $this->db->order_by('nama', 'ASC');
        $this->db->from('tb_siswa');
        $this->db->join('tb_halaqoh_detail', 'tb_siswa.id = tb_halaqoh_detail.id_siswa', 'left');
        $this->db->join('tb_halaqoh', 'tb_halaqoh_detail.id_halaqoh = tb_halaqoh.id', 'left');
        return $this->db->get();
    }

    function get_guru(){
        return $this->db->order_by('nama', 'ASC')->get('tb_guru');
    }

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
}