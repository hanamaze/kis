<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coba_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Coba_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'coba_c/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'coba_c/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'coba_c/index.html';
            $config['first_url'] = base_url() . 'coba_c/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Coba_m->total_rows($q);
        $coba_c = $this->Coba_m->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'coba_c_data' => $coba_c,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('coba_c/coba_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Coba_m->get_by_id($id);
        if ($row) {
            $data = array(
		'id_coba' => $row->id_coba,
		'nama_coba' => $row->nama_coba,
	    );
            $this->load->view('coba_c/coba_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba_c'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('coba_c/create_action'),
	    'id_coba' => set_value('id_coba'),
	    'nama_coba' => set_value('nama_coba'),
	);
        $this->load->view('coba_c/coba_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_coba' => $this->input->post('nama_coba',TRUE),
	    );

            $this->Coba_m->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coba_c'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Coba_m->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('coba_c/update_action'),
		'id_coba' => set_value('id_coba', $row->id_coba),
		'nama_coba' => set_value('nama_coba', $row->nama_coba),
	    );
            $this->load->view('coba_c/coba_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba_c'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_coba', TRUE));
        } else {
            $data = array(
		'nama_coba' => $this->input->post('nama_coba',TRUE),
	    );

            $this->Coba_m->update($this->input->post('id_coba', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coba_c'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Coba_m->get_by_id($id);

        if ($row) {
            $this->Coba_m->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('coba_c'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba_c'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_coba', 'nama coba', 'trim|required');

	$this->form_validation->set_rules('id_coba', 'id_coba', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "coba.xls";
        $judul = "coba";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Coba");

	foreach ($this->Coba_m->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_coba);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Coba_c.php */
/* Location: ./application/controllers/Coba_c.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-11 03:37:48 */
/* http://harviacode.com */