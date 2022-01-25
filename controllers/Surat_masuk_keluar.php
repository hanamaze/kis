<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_masuk_keluar extends CI_Controller
{
	


    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_masuk_keluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_masuk_keluar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_masuk_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_masuk_keluar/index.html';
            $config['first_url'] = base_url() . 'surat_masuk_keluar/index.html';
        }

        $config['total_rows'] = $this->Surat_masuk_keluar_model->total_rows($q);
        $surat_masuk_keluar = $this->Surat_masuk_keluar_model->get_limit_data($q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_masuk_keluar_data' => $surat_masuk_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten' => 'surat_masuk_keluar/surat_masuk_keluar_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Surat_masuk_keluar_model->get_by_id($id);
		
        if ($row) {
            $data = array(
		'id_surat' => $row->id_surat,
		'no_surat' => $row->no_surat,
		'tanggal' => $row->tanggal,
		'deskripsi' => $row->deskripsi,
		'keterangan' => $row->keterangan,
		'file' => $row->file,
		'status' => $row->status,
		'id_user' => $row->id_user,
		
	    );
		
            $this->load->view('surat_masuk_keluar/surat_masuk_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_masuk_keluar'));
        }
    }
/*
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_masuk_keluar/create_action'),
	    'id_surat' => set_value('id_surat'),
	    'no_surat' => set_value('no_surat'),
	    'tanggal' => set_value('tanggal'),
	    'deskripsi' => set_value('deskripsi'),
	    'keterangan' => set_value('keterangan'),
	    'file' => set_value('file'),
		'status' => set_value('status'),
	    'id_user' => set_value('id_user'),
	);
        $this->load->view('surat_masuk_keluar/surat_masuk_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		'status' => $this->input->post('status',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );
	    

            $this->Surat_masuk_keluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_masuk_keluar'));
        }
    }
*/
public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->Surat_masuk_keluar_model->upload();
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->Surat_masuk_keluar_model->save($upload);
				
				redirect('surat_masuk_keluar'); // Redirect kembali ke halaman awal / halaman view data
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('surat_masuk_keluar/form', $data);
	}

    
    public function update($id) 
    {
        $row = $this->Surat_masuk_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_masuk_keluar/update_action'),
		'id_surat' => set_value('id_surat', $row->id_surat),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'file' => set_value('file', $row->file),
		'status' => set_value('status', $row->status),
		'id_user' => set_value('id_user', $row->id_user),
		'konten' => 'surat_masuk_keluar/surat_masuk_keluar_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_masuk_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		$upload = $this->Surat_masuk_keluar_model->upload();
        
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $upload['file']['file_name'],
		'status' => $this->input->post('status',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );
		
            $this->Surat_masuk_keluar_model->update($this->input->post('id_surat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_masuk_keluar'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_masuk_keluar_model->get_by_id($id);

        if ($row) {
            $this->Surat_masuk_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_masuk_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_masuk_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('status', 'id user', 'trim|required');
	$this->form_validation->set_rules('id_surat', 'id_surat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
