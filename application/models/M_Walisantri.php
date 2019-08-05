<?php
class M_Walisantri extends CI_Model{

    function get_musyrif($idsantri){
        $this->db->select('tb_guru.nama');
        $this->db->from('tb_halaqoh_detail');
        $this->db->join('tb_halaqoh', 'tb_halaqoh_detail.id_halaqoh = tb_halaqoh.id');
        $this->db->join('tb_guru', 'tb_halaqoh.id_guru = tb_guru.id');
        $this->db->where(['tb_halaqoh_detail.id_siswa'=>$idsantri]);
        return $this->db->get();
    }

    function get_siswa($idsantri){
        return $this->db->get_where('tb_siswa', ['id'=>$idsantri])->row();
    }

    function get_hafalanbaru($idsantri){
        $this->db->select('tb_setoran.*, tb_siswa.nama');
        $this->db->from('tb_setoran');
        $this->db->join('tb_halaqoh', 'tb_setoran.id_halaqoh = tb_halaqoh.id');
        $this->db->join('tb_siswa', 'tb_setoran.id_siswa = tb_siswa.id');
        $this->db->where(['tb_setoran.jenis'=>'hafalan', 'tb_setoran.id_siswa'=>$idsantri]);
        return $this->db->get(); 
    }

    function get_murojaah($idsantri){
        $this->db->select('tb_setoran.*, tb_siswa.nama');
        $this->db->from('tb_setoran');
        $this->db->join('tb_halaqoh', 'tb_setoran.id_halaqoh = tb_halaqoh.id');
        $this->db->join('tb_siswa', 'tb_setoran.id_siswa = tb_siswa.id');
        $this->db->where(['tb_setoran.jenis'=>'murojaah', 'tb_setoran.id_siswa'=>$idsantri]);
        return $this->db->get();
    }
}