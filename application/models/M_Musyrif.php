<?php
class M_Musyrif extends CI_Model{

    function get_santrihalaqoh($id_guru){
        $this->db->select('tb_siswa.nama,tb_siswa.id ,tb_halaqoh.nama_halaqoh');
        $this->db->order_by('nama', 'ASC');
        $this->db->from('tb_siswa');
        $this->db->join('tb_halaqoh_detail', 'tb_siswa.id = tb_halaqoh_detail.id_siswa', 'left');
        $this->db->join('tb_halaqoh', 'tb_halaqoh_detail.id_halaqoh = tb_halaqoh.id', 'left');
        $this->db->where(['tb_halaqoh.id_guru'=>$id_guru]);
        return $this->db->get();
    }


    function get_hafalanbaru($id_guru){
        $this->db->select('tb_setoran.*, tb_siswa.nama');
        $this->db->from('tb_setoran');
        $this->db->join('tb_halaqoh', 'tb_setoran.id_halaqoh = tb_halaqoh.id');
        $this->db->join('tb_siswa', 'tb_setoran.id_siswa = tb_siswa.id');
        $this->db->where(['tb_halaqoh.id_guru'=>$id_guru, 'tb_setoran.jenis'=>'hafalan']);
        return $this->db->get();
    }

    function get_murojaah($id_guru){
        $this->db->select('tb_setoran.*, tb_siswa.nama');
        $this->db->from('tb_setoran');
        $this->db->join('tb_halaqoh', 'tb_setoran.id_halaqoh = tb_halaqoh.id');
        $this->db->join('tb_siswa', 'tb_setoran.id_siswa = tb_siswa.id');
        $this->db->where(['tb_halaqoh.id_guru'=>$id_guru, 'tb_setoran.jenis'=>'murojaah']);
        return $this->db->get();
    }

    function tambah_hafalan($idhalaqoh){
        $data = [
            'tanggal'       => $this->input->post('tanggal', TRUE),
            'id_halaqoh'    => $idhalaqoh,
            'id_siswa'      => $this->input->post('id_siswa', TRUE),
            'jenis'         => 'hafalan',
            'surat'         => $this->input->post('surat', TRUE),
            'ayat'          => $this->input->post('ayat', TRUE),
            'juz'           => $this->input->post('juz', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE),
            'keterangan'    => $this->input->post('keterangan', TRUE),
        ];
        $this->db->insert('tb_setoran', $data);
    }

    function edit_hafalan($id){
        $data = [
            'tanggal'       => $this->input->post('tanggal', TRUE),
            'id_siswa'      => $this->input->post('id_siswa', TRUE),
            'jenis'         => 'hafalan',
            'surat'         => $this->input->post('surat', TRUE),
            'ayat'          => $this->input->post('ayat', TRUE),
            'juz'           => $this->input->post('juz', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE),
            'keterangan'    => $this->input->post('keterangan', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_setoran', $data);
    }

    function delete_hafalan($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_setoran');
    }

    function tambah_murojaah($idhalaqoh){
        $data = [
            'tanggal'       => $this->input->post('tanggal', TRUE),
            'id_halaqoh'    => $idhalaqoh,
            'id_siswa'      => $this->input->post('id_siswa', TRUE),
            'jenis'         => 'murojaah',
            'surat'         => $this->input->post('surat', TRUE),
            'ayat'          => $this->input->post('ayat', TRUE),
            'juz'           => $this->input->post('juz', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE),
            'keterangan'    => $this->input->post('keterangan', TRUE),
        ];
        $this->db->insert('tb_setoran', $data);
    }

    function edit_murojaah($id){
        $data = [
            'tanggal'       => $this->input->post('tanggal', TRUE),
            'id_siswa'      => $this->input->post('id_siswa', TRUE),
            'jenis'         => 'murojaah',
            'surat'         => $this->input->post('surat', TRUE),
            'ayat'          => $this->input->post('ayat', TRUE),
            'juz'           => $this->input->post('juz', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE),
            'keterangan'    => $this->input->post('keterangan', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_setoran', $data);
    }

    function delete_murojaah($id){
        $this->db->where('id', $id);
        $this->db->delete('tb_setoran');
    }
}