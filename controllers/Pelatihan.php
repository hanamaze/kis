<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelatihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatihan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelatihan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelatihan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelatihan/index.html';
            $config['first_url'] = base_url() . 'pelatihan/index.html';
        }


        $pelatihan = $this->Pelatihan_model->get_limit_data($start);
        $total_peserta = $this->Pelatihan_model->total_peserta();
        


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelatihan_data' => $pelatihan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
            'total_peserta' => $total_peserta,
            'konten' => 'pelatihan/pelatihan_list',
        );
        $this->load->view('index', $data);
    }
    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Pelatihan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelatihan' => $row->id_pelatihan,
		'id_kategori_pelatihan' => $row->id_kategori_pelatihan,
		'nama_pelatihan' => $row->nama_pelatihan,
		'tempat' => $row->tempat,
        'tanggal_mulai' => $row->tanggal_mulai,
        'tanggal_selesai' => $row->tanggal_selesai,
        'kota' => $row->kota,
		'keterangan' => $row->keterangan,
		'keluar_sertifikat' => $row->keluar_sertifikat,
	    );
            $this->load->view('pelatihan/pelatihan_read', $data);
			$this->load->view('pelatihan/peserta_list',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatihan'));
        }
    }
	
	    public function read2() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Pelatihan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelatihan' => $row->id_pelatihan,
		'id_kategori_pelatihan' => $row->id_kategori_pelatihan,
		'nama_pelatihan' => $row->nama_pelatihan,
		'tempat' => $row->tempat,
        'tanggal_mulai' => $row->tanggal_mulai,
        'tanggal_selesai' => $row->tanggal_selesai,
        'kota' => $row->kota,
		'keterangan' => $row->keterangan,
		'keluar_sertifikat' => $row->keluar_sertifikat,
	    );
            $this->load->view('pelatihan/pelatihan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatihan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelatihan/create_action'),
	    'id_pelatihan' => set_value('id_pelatihan'),
	    'id_kategori_pelatihan' => set_value('id_kategori_pelatihan'),
	    'nama_pelatihan' => set_value('nama_pelatihan'),
	    'tempat' => set_value('tempat'),
        'tanggal_mulai' => set_value('tanggal_mulai'),
        'tanggal_selesai' => set_value('tanggal_selesai'),
        'kota' => set_value('kota'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('pelatihan/pelatihan_form', $data);
    }
    
    public function create_action() 
    {
		include "cryptz.php";
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kategori_pelatihan' => $this->input->post('id_kategori_pelatihan',TRUE),
		'nama_pelatihan' => md5_encrypt($this->input->post('nama_pelatihan',TRUE)),
		'tempat' => md5_encrypt($this->input->post('tempat',TRUE)),
        'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        'kota' => md5_encrypt($this->input->post('kota',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
	    );

            $this->Pelatihan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelatihan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelatihan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelatihan/update_action'),
		'id_pelatihan' => set_value('id_pelatihan', $row->id_pelatihan),
		'id_kategori_pelatihan' => set_value('id_kategori_pelatihan', $row->id_kategori_pelatihan),
		'nama_pelatihan' => set_value('nama_pelatihan', $row->nama_pelatihan),
		'tempat' => set_value('tempat', $row->tempat),
        'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
        'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
        'kota' => set_value('kota', $row->kota),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'keluar_sertifikat' => set_value('keluar_sertifikat', $row->keluar_sertifikat),
	   'konten' => 'pelatihan/pelatihan_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatihan'));
        }
    }
    
    public function update_action() 
    {
		include "cryptz.php";
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelatihan', TRUE));
        } else {
            $data = array(
		'id_kategori_pelatihan' => $this->input->post('id_kategori_pelatihan',TRUE),
		'nama_pelatihan' => md5_encrypt($this->input->post('nama_pelatihan',TRUE)),
		'tempat' => md5_encrypt($this->input->post('tempat',TRUE)),
        'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        'kota' => md5_encrypt($this->input->post('kota',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
		'keluar_sertifikat' => $this->input->post('keluar_sertifikat',TRUE),
	    );

            $this->Pelatihan_model->update($this->input->post('id_pelatihan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelatihan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelatihan_model->get_by_id($id);

        if ($row) {
            $this->Pelatihan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelatihan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelatihan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pelatihan', 'nama pelatihan', 'trim|required');
	$this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('id_kategori_pelatihan', 'id_kategori_pelatihan', 'trim');
	$this->form_validation->set_rules('id_pelatihan', 'id_pelatihan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pelatihan.xls";
        $judul = "pelatihan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pelatihan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Pelatihan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pelatihan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pelatihan.doc");

        $data = array(
            'pelatihan_data' => $this->Pelatihan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pelatihan/pelatihan_doc',$data);
    }

}





