<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kontak/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kontak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kontak/index.html';
            $config['first_url'] = base_url() . 'kontak/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kontak_model->total_rows($q);
        
        //bawaan harvia - page number
        //$kontak = $this->Kontak_model->get_limit_data($config['per_page'], $start, $q);
        $kontak = $this->Kontak_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kontak_data' => $kontak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            // tambah konten
            'konten' => 'kontak/kontak_list',
        );
        //$this->load->view('kontak/kontak_list', $data);
        //diganti tampilan
        $this->load->view('index', $data);

    
    }
    

    public function read($id) 
    {

        //tambah id
        $id = $this->input->post('id');
        $row = $this->Kontak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kontak' => $row->id_kontak,
		'nama_kontak' => $row->nama_kontak,
		'instansi' => $row->instansi,
		'no_hp1' => $row->no_hp1,
		'no_hp2' => $row->no_hp2,
		'email_1' => $row->email_1,
		'email_2' => $row->email_2,
		'alamat_1' => $row->alamat_1,
		'alamat_2' => $row->alamat_2,
		'ket' => $row->ket,
	    );
            $this->load->view('kontak/kontak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kontak/create_action'),
	    'id_kontak' => set_value('id_kontak'),
	    'nama_kontak' => set_value('nama_kontak'),
	    'instansi' => set_value('instansi'),
	    'no_hp1' => set_value('no_hp1'),
	    'no_hp2' => set_value('no_hp2'),
	    'email_1' => set_value('email_1'),
	    'email_2' => set_value('email_2'),
	    'alamat_1' => set_value('alamat_1'),
	    'alamat_2' => set_value('alamat_2'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('kontak/kontak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kontak' => $this->input->post('nama_kontak',TRUE),
		'instansi' => $this->input->post('instansi',TRUE),
		'no_hp1' => $this->input->post('no_hp1',TRUE),
		'no_hp2' => $this->input->post('no_hp2',TRUE),
		'email_1' => $this->input->post('email_1',TRUE),
		'email_2' => $this->input->post('email_2',TRUE),
		'alamat_1' => $this->input->post('alamat_1',TRUE),
		'alamat_2' => $this->input->post('alamat_2',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Kontak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kontak/update_action'),
		'id_kontak' => set_value('id_kontak', $row->id_kontak),
		'nama_kontak' => set_value('nama_kontak', $row->nama_kontak),
		'instansi' => set_value('instansi', $row->instansi),
		'no_hp1' => set_value('no_hp1', $row->no_hp1),
		'no_hp2' => set_value('no_hp2', $row->no_hp2),
		'email_1' => set_value('email_1', $row->email_1),
		'email_2' => set_value('email_2', $row->email_2),
		'alamat_1' => set_value('alamat_1', $row->alamat_1),
		'alamat_2' => set_value('alamat_2', $row->alamat_2),
		'ket' => set_value('ket', $row->ket),
        //tambah konten
        'konten' => 'kontak/kontak_form',
        
	    );
            //$this->load->view('kontak/kontak_form', $data);
            //diganti
            $this->load->view('index', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kontak', TRUE));
        } else {
            $data = array(
		'nama_kontak' => $this->input->post('nama_kontak',TRUE),
		'instansi' => $this->input->post('instansi',TRUE),
		'no_hp1' => $this->input->post('no_hp1',TRUE),
		'no_hp2' => $this->input->post('no_hp2',TRUE),
		'email_1' => $this->input->post('email_1',TRUE),
		'email_2' => $this->input->post('email_2',TRUE),
		'alamat_1' => $this->input->post('alamat_1',TRUE),
		'alamat_2' => $this->input->post('alamat_2',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Kontak_model->update($this->input->post('id_kontak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $this->Kontak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kontak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kontak', 'nama kontak', 'trim|required');
	//$this->form_validation->set_rules('instansi', 'instansi', 'trim|required');
	$this->form_validation->set_rules('no_hp1', 'no hp1', 'trim|required');
	//$this->form_validation->set_rules('no_hp2', 'no hp2', 'trim|required');
	//$this->form_validation->set_rules('email_1', 'email 1', 'trim|required');
	//$this->form_validation->set_rules('email_2', 'email 2', 'trim|required');
	$this->form_validation->set_rules('alamat_1', 'alamat 1', 'trim|required');
	//$this->form_validation->set_rules('alamat_2', 'alamat 2', 'trim|required');
	//$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id_kontak', 'id_kontak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kontak.xls";
        $judul = "kontak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kontak");
	xlsWriteLabel($tablehead, $kolomhead++, "Instansi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp1");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp2");
	xlsWriteLabel($tablehead, $kolomhead++, "Email 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Email 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat 1");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat 2");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Kontak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kontak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->instansi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_2);
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
        header("Content-Disposition: attachment;Filename=kontak.doc");

        $data = array(
            'kontak_data' => $this->Kontak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kontak/kontak_doc',$data);
    }

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-26 09:05:21 */
/* http://harviacode.com */