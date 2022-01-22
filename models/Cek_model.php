<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cek_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    // peserta
    function cekk()
    {
        return $this->db->query("SELECT * FROM setting WHERE id_setting='1' AND status='1'")->row();
    }
    // peserta
    function q2($id)
    {
        return $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id'")->row()
    }
}

