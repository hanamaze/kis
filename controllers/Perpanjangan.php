<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perpanjangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perpanjangan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $start = intval($this->input->get('start'));
        $perpanjangan = $this->Perpanjangan_model->get_data($start);
        $data = array(
            'perpanjangan_data' => $perpanjangan,
            'start' => $start,
            'konten' => 'perpanjangan/perpanjangan_list',
        );
        $this->load->view('index', $data);
    }
public function data($id)
    {

        $start = intval($this->input->get('start'));
        $perpanjangan = $this->db->query("SELECT * FROM perpanjangan WHERE id_kategori_pelatihan='$id'")->result();
        $data = array(
            'perpanjangan_data' => $perpanjangan,
            'start' => $start,
            'konten' => 'perpanjangan/perpanjangan_list',
        );
        $this->load->view('index', $data);
    }
    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Perpanjangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_perpanjangan' => $row->id_perpanjangan,
		'id_kategori_pelatihan' => $row->id_kategori_pelatihan,
		'nama_peserta' => $row->nama_peserta,
		'tempat_lahir' => $row->tempat_lahir,
        'tgl_lahir' => $row->tgl_lahir,
        'nik' => $row->nik,
        'pendidikan' => $row->pendidikan,
        'no_reg' => $row->no_reg,
        'no_sert' => $row->no_sert,
        'perusahaan' => $row->perusahaan,
		'alamat' => $row->alamat,
        'no_surat_permo' => $row->no_surat_permo,
        'tgl_surat_permo' => $row->tgl_surat_permo,
		'tgl_submit' => $row->tgl_submit,
        'no_ptsa' => $row->no_ptsa,
		'status' => $row->status,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('perpanjangan/perpanjangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('perpanjangan'));
        }
    }

    public function create() 
    {
		$id = $this->input->post('id');
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('perpanjangan/create_action'),
	    'id_perpanjangan' => set_value('id_perpanjangan'),
	    'id_kategori_pelatihan' => set_value('id_kategori_pelatihan'),
	    'nama_peserta' => set_value('nama_peserta'),
        'tempat_lahir'  => set_value( 'tempat_lahir'),
        'tgl_lahir'  => set_value( 'tgl_lahir'),
        'nik'  => set_value( 'nik'),
        'pendidikan'  => set_value( 'pendidikan'),
        'no_reg'   => set_value( 'no_reg'),
        'no_sert'   => set_value( 'no_sert'),
        'perusahaan'   => set_value( 'perusahaan'),
		'alamat'   => set_value ( 'alamat'),
        'no_surat_permo' => set_value ( 'no_surat_permo'),
        'tgl_surat_permo' => set_value ( 'tgl_surat_permo'),
		'tgl_submit'  => set_value( 'tgl_submit'),
        'no_ptsa'  => set_value( 'no_ptsa'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
		'id_k' => $id,
	);
        $this->load->view('perpanjangan/perpanjangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kategori_pelatihan' => $this->input->post('id_kategori_pelatihan',TRUE),
		'nama_peserta' => $this->input->post('nama_peserta',TRUE),
		'tempat_lahir'  => $this->input->post( 'tempat_lahir',TRUE),
        'tgl_lahir'  => $this->input->post( 'tgl_lahir',TRUE),
        'nik'  => $this->input->post( 'nik',TRUE),
        'pendidikan' => $this->input->post( 'pendidikan',TRUE),
        'no_reg' => $this->input->post( 'no_reg',TRUE), 
        'no_sert' => $this->input->post( 'no_sert',TRUE),
        'perusahaan' => $this->input->post( 'perusahaan',TRUE),
        'alamat' => $this->input->post ( 'alamat',TRUE),
        'no_surat_permo' => $this->input->post ( 'no_surat_permo',TRUE),
        'tgl_surat_permo' => $this->input->post ( 'tgl_surat_permo',TRUE),
        'tgl_submit'  => $this->input->post( 'tgl_submit',TRUE),
        'no_ptsa'  => $this->input->post( 'no_ptsa',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Perpanjangan_model->insert($data);
            $this->session->set_flashdata('message', 'Input Data Berhasil ');
            redirect(site_url('perpanjangan/data/'.$this->input->post('id_kategori_pelatihan',TRUE)));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perpanjangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('perpanjangan/update_action'),
		'id_perpanjangan' => set_value('id_perpanjangan', $row->id_perpanjangan),
		'id_kategori_pelatihan' => set_value('id_kategori_pelatihan', $row->id_kategori_pelatihan),
		'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
		'tempat_lahir'  => set_value( 'tempat_lahir',$row->tempat_lahir),
        'tgl_lahir'  => set_value( 'tgl_lahir',$row->tgl_lahir),
        'nik'  => set_value( 'nik',$row->nik),
        'pendidikan'  => set_value( 'pendidikan',$row->pendidikan),
        'no_reg'   => set_value( 'no_reg',$row->no_reg),
        'no_sert'   => set_value( 'no_sert',$row->no_sert),
        'perusahaan'   => set_value( 'perusahaan',$row->perusahaan),
        'alamat'   => set_value ( 'alamat',$row->alamat),
        'no_surat_permo' => set_value ( 'no_surat_permo',$row->no_surat_permo),
        'tgl_surat_permo' => set_value ( 'tgl_surat_permo',$row->tgl_surat_permo),
        'tgl_submit'  => set_value( 'tgl_submit',$row->tgl_submit),
        'no_ptsa'  => set_value( 'no_ptsa',$row->no_ptsa),        
		'status' => set_value('status', $row->status),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    'konten' => 'perpanjangan/perpanjangan_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('perpanjangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perpanjangan', TRUE));
        } else {
            $data = array(
		'id_kategori_pelatihan' => $this->input->post('id_kategori_pelatihan',TRUE),
		'nama_peserta' => $this->input->post('nama_peserta',TRUE),
		'tempat_lahir'  => $this->input->post( 'tempat_lahir',TRUE),
        'tgl_lahir'  => $this->input->post( 'tgl_lahir',TRUE),
        'nik'  => $this->input->post( 'nik',TRUE),
        'pendidikan'  => $this->input->post( 'pendidikan',TRUE),
        'no_reg'   => $this->input->post( 'no_reg',TRUE),
        'no_sert'   => $this->input->post( 'no_sert',TRUE),
        'perusahaan'   => $this->input->post( 'perusahaan',TRUE),
        'alamat'   => $this->input->post ( 'alamat',TRUE),
        'no_surat_permo' => $this->input->post ( 'no_surat_permo',TRUE),
        'tgl_surat_permo' => $this->input->post ( 'tgl_surat_permo',TRUE),
        'tgl_submit'  => $this->input->post( 'tgl_submit',TRUE),
        'no_ptsa'  => $this->input->post( 'no_ptsa',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Perpanjangan_model->update($this->input->post('id_perpanjangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Edit Data Berhasil');
            redirect(site_url('perpanjangan/data/'.$this->input->post('id_kategori_pelatihan',TRUE)));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perpanjangan_model->get_by_id($id);

        if ($row) {
            $this->Perpanjangan_model->delete($id);
            
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('perpanjangan/data/'.$row->id_kategori_pelatihan));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('perpanjangan/data/'.$row->id_kategori_pelatihan));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kategori_pelatihan', 'id kategori pelatihan', 'trim|required');
	$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
    $this->form_validation->set_rules('no_reg', 'no_reg', 'trim|required');
    $this->form_validation->set_rules('no_sert', 'no_sert', 'trim|required');
    $this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('no_surat_permo', 'no_surat_permo', 'trim|required');
    $this->form_validation->set_rules('tgl_surat_permo', 'tgl_surat_permo', 'trim|required');
    $this->form_validation->set_rules('tgl_submit', 'tgl_submit', 'trim|required');
    $this->form_validation->set_rules('no_ptsa', 'no_ptsa', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_perpanjangan', 'id_perpanjangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "perpanjangan.xls";
        $judul = "perpanjangan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori Pelatihan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Perpanjangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Perpanjangan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori_pelatihan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_perpanjangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
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
        header("Content-Disposition: attachment;Filename=perpanjangan.doc");

        $data = array(
            'perpanjangan_data' => $this->Perpanjangan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('perpanjangan/perpanjangan_doc',$data);
    }

}






/* http://djagatrayanetwork.com */ 