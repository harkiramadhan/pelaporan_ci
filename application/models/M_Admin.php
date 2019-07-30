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
}