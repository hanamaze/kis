<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_iso extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_iso_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_iso/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_iso/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_iso/index.html';
            $config['first_url'] = base_url() . 'laporan_iso/index.html';
        }


        $config['total_rows'] = $this->Laporan_iso_model->total_rows($q);
        $laporan_iso = $this->Laporan_iso_model->get_limit_data($q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_iso_data' => $laporan_iso,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'laporan_iso/laporan_iso_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Laporan_iso_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan_iso' => $row->id_laporan_iso,
		'no_surat' => $row->no_surat,
		'nama_pt' => $row->nama_pt,
		'alamat' => $row->alamat,
		'auditor' => $row->auditor,
		'tgl_1' => $row->tgl_1,
		'tgl_2' => $row->tgl_2,
		'tgl_3' => $row->tgl_3,
		'tgl_4' => $row->tgl_4,
		'tgl_5' => $row->tgl_5,
		'tgl_6' => $row->tgl_6,
	    );
            $this->load->view('laporan_iso/laporan_iso_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_iso'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_iso/create_action'),
	    'id_laporan_iso' => set_value('id_laporan_iso'),
	    'no_surat' => set_value('no_surat'),
	    'nama_pt' => set_value('nama_pt'),
	    'alamat' => set_value('alamat'),
	    'auditor' => set_value('auditor'),
	    'tgl_1' => set_value('tgl_1'),
	    'tgl_2' => set_value('tgl_2'),
	    'tgl_3' => set_value('tgl_3'),
	    'tgl_4' => set_value('tgl_4'),
	    'tgl_5' => set_value('tgl_5'),
	    'tgl_6' => set_value('tgl_6'),
	);
        $this->load->view('laporan_iso/laporan_iso_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nama_pt' => $this->input->post('nama_pt',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'auditor' => $this->input->post('auditor',TRUE),
		'tgl_1' => $this->input->post('tgl_1',TRUE),
		'tgl_2' => $this->input->post('tgl_2',TRUE),
		'tgl_3' => $this->input->post('tgl_3',TRUE),
		'tgl_4' => $this->input->post('tgl_4',TRUE),
		'tgl_5' => $this->input->post('tgl_5',TRUE),
		'tgl_6' => $this->input->post('tgl_6',TRUE),
	    );

            $this->Laporan_iso_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('laporan_iso'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_iso_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_iso/update_action'),
		'id_laporan_iso' => set_value('id_laporan_iso', $row->id_laporan_iso),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'nama_pt' => set_value('nama_pt', $row->nama_pt),
		'alamat' => set_value('alamat', $row->alamat),
		'auditor' => set_value('auditor', $row->auditor),
		'tgl_1' => set_value('tgl_1', $row->tgl_1),
		'tgl_2' => set_value('tgl_2', $row->tgl_2),
		'tgl_3' => set_value('tgl_3', $row->tgl_3),
		'tgl_4' => set_value('tgl_4', $row->tgl_4),
		'tgl_5' => set_value('tgl_5', $row->tgl_5),
		'tgl_6' => set_value('tgl_6', $row->tgl_6),
		'konten' => 'laporan_iso/laporan_iso_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_iso'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan_iso', TRUE));
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nama_pt' => $this->input->post('nama_pt',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'auditor' => $this->input->post('auditor',TRUE),
		'tgl_1' => $this->input->post('tgl_1',TRUE),
		'tgl_2' => $this->input->post('tgl_2',TRUE),
		'tgl_3' => $this->input->post('tgl_3',TRUE),
		'tgl_4' => $this->input->post('tgl_4',TRUE),
		'tgl_5' => $this->input->post('tgl_5',TRUE),
		'tgl_6' => $this->input->post('tgl_6',TRUE),
	    );

            $this->Laporan_iso_model->update($this->input->post('id_laporan_iso', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_iso'));
        }
    }
	public function cetak($id) 
    {
        ob_start();
        $row = $this->Laporan_iso_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nama_pt' => $this->input->post('nama_pt',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'auditor' => $this->input->post('auditor',TRUE),
		'tgl_1' => $this->input->post('tgl_1',TRUE),
		'tgl_2' => $this->input->post('tgl_2',TRUE),
		'tgl_3' => $this->input->post('tgl_3',TRUE),
		'tgl_4' => $this->input->post('tgl_4',TRUE),
		'tgl_5' => $this->input->post('tgl_5',TRUE),
		'tgl_6' => $this->input->post('tgl_6',TRUE),
	    );
            $this->load->view('laporan_iso/iso_cetak', $data);
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('/assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en');    
            $pdf->WriteHTML($html);    
            $pdf->Output($row->nama_pt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_iso_model->get_by_id($id);

        if ($row) {
            $this->Laporan_iso_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_iso'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_iso'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('nama_pt', 'nama pt', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('auditor', 'auditor', 'trim|required');
	$this->form_validation->set_rules('tgl_1', 'tgl 1', 'trim|required');
	$this->form_validation->set_rules('tgl_2', 'tgl 2', 'trim|required');
	$this->form_validation->set_rules('tgl_3', 'tgl 3', 'trim|required');
	$this->form_validation->set_rules('tgl_4', 'tgl 4', 'trim|required');
	$this->form_validation->set_rules('tgl_5', 'tgl 5', 'trim|required');
	$this->form_validation->set_rules('tgl_6', 'tgl 6', 'trim|required');

	$this->form_validation->set_rules('id_laporan_iso', 'id_laporan_iso', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan_iso.xls";
        $judul = "laporan_iso";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pt");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Auditor");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 3");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 4");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 5");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl 6");

	foreach ($this->Laporan_iso_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->auditor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_6);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=laporan_iso.doc");

        $data = array(
            'laporan_iso_data' => $this->Laporan_iso_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporan_iso/laporan_iso_doc',$data);
    }

}

/* End of file Laporan_iso.php */
/* Location: ./application/controllers/Laporan_iso.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-09 07:08:18 */
/* http://harviacode.com */