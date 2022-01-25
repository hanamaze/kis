<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nomor_smk3 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nomor_smk3_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nomor_smk3/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nomor_smk3/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nomor_smk3/index.html';
            $config['first_url'] = base_url() . 'nomor_smk3/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nomor_smk3_model->total_rows($q);
        $nomor_smk3 = $this->Nomor_smk3_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nomor_smk3_data' => $nomor_smk3,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'nomor_smk3/nomor_smk3_list',
        );
        $this->load->view('index', $data);
        //diganti tampilan
        //$this->load->view('nomor_smk3/nomor_smk3_list', $data);
    }

    public function read($id) 
    {
        //tambah id
        $id = $this->input->post('id');
        $row = $this->Nomor_smk3_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nomorsmk3' => $row->id_nomorsmk3,
		'nama_perusahaan' => $row->nama_perusahaan,
		'no_laporan' => $row->no_laporan,
		'no_aplikasi' => $row->no_aplikasi,
		'no_ska' => $row->no_ska,
		'tgl_audit' => $row->tgl_audit,
		'pembawa' => $row->pembawa,
		'ket' => $row->ket,
	    );
            $this->load->view('nomor_smk3/nomor_smk3_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_smk3'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nomor_smk3/create_action'),
	    'id_nomorsmk3' => set_value('id_nomorsmk3'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'no_laporan' => set_value('no_laporan'),
	    'no_aplikasi' => set_value('no_aplikasi'),
	    'no_ska' => set_value('no_ska'),
	    'tgl_audit' => set_value('tgl_audit'),
	    'pembawa' => set_value('pembawa'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('nomor_smk3/nomor_smk3_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_laporan' => $this->input->post('no_laporan',TRUE),
		'no_aplikasi' => $this->input->post('no_aplikasi',TRUE),
		'no_ska' => $this->input->post('no_ska',TRUE),
		'tgl_audit' => $this->input->post('tgl_audit',TRUE),
		'pembawa' => $this->input->post('pembawa',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Nomor_smk3_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nomor_smk3'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nomor_smk3_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('nomor_smk3/update_action'),
		'id_nomorsmk3' => set_value('id_nomorsmk3', $row->id_nomorsmk3),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'no_laporan' => set_value('no_laporan', $row->no_laporan),
		'no_aplikasi' => set_value('no_aplikasi', $row->no_aplikasi),
		'no_ska' => set_value('no_ska', $row->no_ska),
		'tgl_audit' => set_value('tgl_audit', $row->tgl_audit),
		'pembawa' => set_value('pembawa', $row->pembawa),
		'ket' => set_value('ket', $row->ket),
        'konten' => 'nomor_smk3/nomor_smk3_form',
	    );
            //$this->load->view('nomor_smk3/nomor_smk3_form', $data);
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_smk3'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nomorsmk3', TRUE));
        } else {
            $data = array(
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'no_laporan' => $this->input->post('no_laporan',TRUE),
		'no_aplikasi' => $this->input->post('no_aplikasi',TRUE),
		'no_ska' => $this->input->post('no_ska',TRUE),
		'tgl_audit' => $this->input->post('tgl_audit',TRUE),
		'pembawa' => $this->input->post('pembawa',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Nomor_smk3_model->update($this->input->post('id_nomorsmk3', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nomor_smk3'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nomor_smk3_model->get_by_id($id);

        if ($row) {
            $this->Nomor_smk3_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nomor_smk3'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nomor_smk3'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('no_laporan', 'no laporan', 'trim|required');
	$this->form_validation->set_rules('no_aplikasi', 'no aplikasi', 'trim|required');
	$this->form_validation->set_rules('no_ska', 'no ska', 'trim|required');
	$this->form_validation->set_rules('tgl_audit', 'tgl audit', 'trim|required');
	$this->form_validation->set_rules('pembawa', 'pembawa', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_nomorsmk3', 'id_nomorsmk3', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nomor_smk3.xls";
        $judul = "nomor_smk3";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Laporan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Aplikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Ska");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Audit");
	xlsWriteLabel($tablehead, $kolomhead++, "Pembawa");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Nomor_smk3_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_laporan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_aplikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_ska);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_audit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembawa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Nomor_smk3.php */
/* Location: ./application/controllers/Nomor_smk3.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-24 09:11:54 */
/* http://harviacode.com */