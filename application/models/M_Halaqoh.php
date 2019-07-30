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
}