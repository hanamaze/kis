<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nomor_iso extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nomor_iso_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nomor_iso/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nomor_iso/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nomor_iso/index.html';
            $config['first_url'] = base_url() . 'nomor_iso/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nomor_iso_model->total_rows($q);
        //$nomor_iso = $this->Nomor_iso_model->get_limit_data($config['per_page'], $start, $q);
        $nomor_iso = $this->Nomor_iso_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nomor_iso_data' => $nomor_iso,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'nomor_iso/nomor_iso_list',
        );
        $this->load->view('index', $data);
        //$this->load->view('nomor_iso/nomor_iso_list', $data);
    }

    public function read($id) 
    {
        $id = $this->input->post('id');
        $row = $this->Nomor_iso_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nomoriso' => $row->id_nomoriso,
		'tgl_issued' => $row->tgl_issued,
		'nama_perusahaan' => $row->nama_perusahaan,
		'no_audit' => $row->no_audit,
		'jenis_iso' => $row->jenis_iso,
		'pembawa' => $row->pembawa,
		'ket' => $row->ket,
	    );
            $this->load->view('nomor_iso/nomor_iso_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_iso'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('nomor_iso/create_action'),
	    'id_nomoriso' => set_value('id_nomoriso'),
	    'tgl_issued' => set_value('tgl_issued'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'no_audit' => set_value('no_audit'),
	    'jenis_iso' => set_value('jenis_iso'),
	    'pembawa' => set_value('pembawa'),
	    'ket' => set_value('ket'),
       
	);
        $this->load->view('nomor_iso/nomor_iso_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

       
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
    //insert size checkboxes into database.
    //$valjenisiso = implode(',', $this->input->post('jenis_iso'));// Converted array into comma separated value using implode
          
     
       $data = array(
		'tgl_issued' => $this->input->post('tgl_issued',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_audit' => $this->input->post('no_audit',TRUE),
        //'pilih_iso' =>implode(",", $pilih_iso),
        //'jenis_iso' => implode(",", $this->input->post('jenis_iso',TRUE)),
        //'jenis_iso' => $this->input->post('jenis_iso',TRUE),
        //'jenis_iso'=> $valjenisiso,
        'jenis_iso' => $this->input->post('jenis_iso',TRUE),
        'pembawa' => $this->input->post('pembawa',TRUE),
		'ket' => $this->input->post('ket',TRUE),
        

	    );

            $this->Nomor_iso_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nomor_iso'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nomor_iso_model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Edit',
        'action' => site_url('nomor_iso/update_action'),

		'id_nomoriso' => set_value('id_nomoriso', $row->id_nomoriso),
		'tgl_issued' => set_value('tgl_issued', $row->tgl_issued),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'no_audit' => set_value('no_audit', $row->no_audit),
		'jenis_iso' => set_value('jenis_iso', $row->jenis_iso),
		'pembawa' => set_value('pembawa', $row->pembawa),
		'ket' => set_value('ket', $row->ket),
        'konten' => 'nomor_iso/nomor_iso_form',

	    );
           // $this->load->view('nomor_iso/nomor_iso_form', $data);
           $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_iso'));
        }
    }
    
    public function update_action() 
    {
        
        $data = array(
		'tgl_issued' => $this->input->post('tgl_issued',TRUE),
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_audit' => $this->input->post('no_audit',TRUE),
		'jenis_iso' => $this->input->post('jenis_iso',TRUE),
		'pembawa' => $this->input->post('pembawa',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Nomor_iso_model->update($this->input->post('id_nomoriso', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nomor_iso'));
        }
    
    
    public function delete($id) 
    {
        $row = $this->Nomor_iso_model->get_by_id($id);

        if ($row) {
            $this->Nomor_iso_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nomor_iso'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_iso'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_issued', 'tgl issued', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('no_audit', 'no audit', 'trim|required');
	$this->form_validation->set_rules('jenis_iso', 'jenis iso', 'trim|required');
	$this->form_validation->set_rules('pembawa', 'pembawa', 'trim|required');
	//$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('id_nomoriso', 'id_nomoriso', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nomor_iso.php */
/* Location: ./application/controllers/Nomor_iso.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-18 08:56:32 */
/* http://harviacode.com */