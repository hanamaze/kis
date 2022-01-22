<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta_model extends CI_Model
{

    public $table = 'peserta';
    public $id = 'id_peserta';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }    
	// get data by id
    function get_by_id_pelatihan()
    {
        $this->db->where('id_pelatihan', $id);
        return $this->db->get('pelatihan')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_peserta', $q);
	$this->db->or_like('id_pelatihan', $q);
	$this->db->or_like('nama_peserta', $q);
    $this->db->or_like('nik', $q);
	$this->db->or_like('tempat_tgl_lahir', $q);
	$this->db->or_like('perusahaan', $q);
	$this->db->or_like('alamat_perusahaan', $q);
	$this->db->or_like('alamat_rumah', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function upload(){
        $config['upload_path'] = './sertifikat/';
        $config['allowed_types'] = 'jpg|png|jpeg|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = '200000';
        $config['remove_space'] = TRUE;
    
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    
    // Fungsi untuk menyimpan data ke database
    public function save($id, $upload){
        include "cryptz.php";

        $data = array(
            'sertifikat' => $upload['file']['file_name'],
        );
        $this->db->where($this->id, $id);
        $this->db->update('peserta', $data);
    }

        public function upload_idcard(){
        $config['upload_path'] = './idcard/';
        $config['allowed_types'] = 'jpg|png|jpeg|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = '200000';
        $config['remove_space'] = TRUE;
    
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    
    // Fungsi untuk menyimpan data ke database
    public function save_idcard($id, $upload){
        include "cryptz.php";

        $data = array(
            'idcard' => $upload['file']['file_name'],
        );
        $this->db->where('id_pelatihan', $id);
        $this->db->update('pelatihan', $data);
    }

}

