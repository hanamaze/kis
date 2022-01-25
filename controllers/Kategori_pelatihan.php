<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_pelatihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_pelatihan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori_pelatihan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori_pelatihan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori_pelatihan/index.html';
            $config['first_url'] = base_url() . 'kategori_pelatihan/index.html';
        }

        $kategori_pelatihan = $this->Kategori_pelatihan_model->get_all();

        $data = array(
            'kategori_pelatihan_data' => $kategori_pelatihan,
            'start' => $start,
            'konten' => 'kategori_pelatihan/kategori_pelatihan_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Kategori_pelatihan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori_pelatihan' => $row->id_kategori_pelatihan,
		'nama_kategori' => $row->nama_kategori,
		'keterangan' => $row->keterangan,
		'color_chart' => $row->color_chart,
	    );
            $this->load->view('kategori_pelatihan/kategori_pelatihan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_pelatihan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_pelatihan/create_action'),
	    'id_kategori_pelatihan' => set_value('id_kategori_pelatihan'),
	    'nama_kategori' => set_value('nama_kategori'),
	    'keterangan' => set_value('keterangan'),
	    'color_chart' => set_value('color_chart'),
	);
        $this->load->view('kategori_pelatihan/kategori_pelatihan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'color_chart' => $this->input->post('color_chart',TRUE),
	    );

            $this->Kategori_pelatihan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_pelatihan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_pelatihan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_pelatihan/update_action'),
		'id_kategori_pelatihan' => set_value('id_kategori_pelatihan', $row->id_kategori_pelatihan),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'color_chart' => set_value('color_chart', $row->color_chart),
	   'konten' => 'kategori_pelatihan/kategori_pelatihan_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_pelatihan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori_pelatihan', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'color_chart' => $this->input->post('color_chart',TRUE),
	    );

            $this->Kategori_pelatihan_model->update($this->input->post('id_kategori_pelatihan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_pelatihan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_pelatihan_model->get_by_id($id);

        if ($row) {
            $this->Kategori_pelatihan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_pelatihan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_pelatihan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('color_chart', 'color chart', 'trim|required');

	$this->form_validation->set_rules('id_kategori_pelatihan', 'id_kategori_pelatihan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori_pelatihan.xls";
        $judul = "kategori_pelatihan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Color Chart");

	foreach ($this->Kategori_pelatihan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->color_chart);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori_pelatihan.doc");

        $data = array(
            'kategori_pelatihan_data' => $this->Kategori_pelatihan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kategori_pelatihan/kategori_pelatihan_doc',$data);
    }

}





