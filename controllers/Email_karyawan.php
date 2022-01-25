<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Email_karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'email_karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'email_karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'email_karyawan/index.html';
            $config['first_url'] = base_url() . 'email_karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Email_karyawan_model->total_rows($q);
        $email_karyawan = $this->Email_karyawan_model->get_all();

        $data = array(
            'email_karyawan_data' => $email_karyawan,
            'start' => $start,
            'konten' => 'email_karyawan/email_karyawan_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Email_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_email' => $row->id_email,
		'id_karyawan' => $row->id_karyawan,
		'email' => $row->email,
		'status' => $row->status,
	    );
            $this->load->view('email_karyawan/email_karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('email_karyawan'));
        }
    }

    public function create() 
    {
		include "cryptz.php";
        $data = array(
            'button' => 'Create',
            'action' => site_url('email_karyawan/create_action'),
	    'id_email' => set_value('id_email'),
	    'id_karyawan' => set_value('id_karyawan'),
        'whatsapp' => set_value('whatsapp'),
	    'email' => set_value('email'),
	    'status' => set_value('status'),
	);
        $this->load->view('email_karyawan/email_karyawan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        'email' => $this->input->post('email',TRUE),
		'wa' => $this->input->post('whatsapp',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Email_karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('email_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Email_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('email_karyawan/update_action'),
		'id_email' => set_value('id_email', $row->id_email),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'email' => set_value('email', $row->email),
		'status' => set_value('status', $row->status),
	   'konten' => 'email_karyawan/email_karyawan_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('email_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_email', TRUE));
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'email' => $this->input->post('email',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Email_karyawan_model->update($this->input->post('id_email', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('email_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Email_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Email_karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('email_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('email_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_email', 'id_email', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "email_karyawan.xls";
        $judul = "email_karyawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Email_karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=email_karyawan.doc");

        $data = array(
            'email_karyawan_data' => $this->Email_karyawan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('email_karyawan/email_karyawan_doc',$data);
    }

}





