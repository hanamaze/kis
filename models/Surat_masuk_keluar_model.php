<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_masuk_keluar_model extends CI_Model
{

    public $table = 'surat_masuk_keluar';
    public $id = 'id_surat';
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
	
	    // get data by id user
    function get_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_surat', $q);
	$this->db->or_like('no_surat', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('id_user', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_surat', $q);
	$this->db->or_like('no_surat', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('id_user', $q);
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
	
		// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg|doc|docx|xls|xlsx|pdf|zip|rar';
		$config['max_size']	= '200000';
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
	public function save($upload){
		$data = array(
			'no_surat'=>$this->input->post('no_surat'),
			'tanggal' => $this->input->post('tanggal'),
			'deskripsi' => $this->input->post('deskripsi'),
			'keterangan' => $this->input->post('keterangan'),
			'file' => $upload['file']['file_name'],
			'status' => $this->input->post('status'),
			'id_user' => $this->input->post('id_user')
		);
		
		$this->db->insert('surat_masuk_keluar', $data);
	}

}
