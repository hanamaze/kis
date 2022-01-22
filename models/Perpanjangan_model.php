<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perpanjangan_model extends CI_Model
{

    public $table = 'perpanjangan';
    public $id = 'id_perpanjangan';
    public $order = 'DESC';

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

    // ambil data dari id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    

    // ambil data 
    function get_data($start = 0) {   
        return $this->db->get($this->table)->result();
    }

    // input data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // edit data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // hapus data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}


/* http://djagatrayanetwork.com */ 