<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // surat masuk
    function s_masuk()
    {
        return $this->db->query("SELECT * FROM surat_masuk_keluar WHERE status='masuk'")->num_rows();
    }
    // surat keluar
    function s_keluar()
    {
        return $this->db->query("SELECT * FROM surat_masuk_keluar WHERE status='keluar'")->num_rows();
    }
    // karyawan
    function karyawan()
    {
        return $this->db->query("SELECT * FROM karyawan WHERE status_aktif='1'")->num_rows();
    }
   // pelatihan
    function pelatihan()
    {
        return $this->db->get("pelatihan")->num_rows();
    }
    // peserta
    function peserta()
    {
        return $this->db->get("peserta")->num_rows();
    }
    // peserta
    function data_pelatihan()
    {
        return $this->db->query("SELECT * FROM pelatihan")->result();
    }
}

