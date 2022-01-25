<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_iso extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_iso_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kategori_iso/kategori_iso_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kategori_iso_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kategori_iso_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori_iso' => $row->id_kategori_iso,
		'nama_kategori_iso' => $row->nama_kategori_iso,
		'ket' => $row->ket,
	    );
            $this->load->view('kategori_iso/kategori_iso_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_iso'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_iso/create_action'),
	    'id_kategori_iso' => set_value('id_kategori_iso'),
	    'nama_kategori_iso' => set_value('nama_kategori_iso'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('kategori_iso/kategori_iso_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori_iso' => $this->input->post('nama_kategori_iso',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Kategori_iso_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_iso'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_iso_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_iso/update_action'),
		'id_kategori_iso' => set_value('id_kategori_iso', $row->id_kategori_iso),
		'nama_kategori_iso' => set_value('nama_kategori_iso', $row->nama_kategori_iso),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->load->view('kategori_iso/kategori_iso_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_iso'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori_iso', TRUE));
        } else {
            $data = array(
		'nama_kategori_iso' => $this->input->post('nama_kategori_iso',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Kategori_iso_model->update($this->input->post('id_kategori_iso', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_iso'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_iso_model->get_by_id($id);

        if ($row) {
            $this->Kategori_iso_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_iso'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_iso'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori_iso', 'nama kategori iso', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_kategori_iso', 'id_kategori_iso', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori_iso.xls";
        $judul = "kategori_iso";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori Iso");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Kategori_iso_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori_iso);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori_iso.doc");

        $data = array(
            'kategori_iso_data' => $this->Kategori_iso_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kategori_iso/kategori_iso_doc',$data);
    }

}

/* End of file Kategori_iso.php */
/* Location: ./application/controllers/Kategori_iso.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-25 05:08:23 */
/* http://harviacode.com */