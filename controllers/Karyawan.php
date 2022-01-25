<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index.html';
            $config['first_url'] = base_url() . 'karyawan/index.html';
        }


        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->get_limit_data($q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'karyawan/karyawan_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_karyawan' => $row->id_karyawan,
		'nama_karyawan' => $row->nama_karyawan,
		'nik' => $row->nik,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tgl_masuk_kerja' => $row->tgl_masuk_kerja,
		'jabatan' => $row->jabatan,
		'tgl_lahir' => $row->tgl_lahir,
		'nama_ibu_kandung' => $row->nama_ibu_kandung,
		'status' => $row->status,
		'jumlah_anak' => $row->jumlah_anak,
		'alamat' => $row->alamat,
		'no_hp' => $row->no_hp,
		'keterangan' => $row->keterangan,
		'foto' => $row->foto,
		'status_aktif' => $row->status_aktif,
	    );
            $this->load->view('karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
/*
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'nama_karyawan' => set_value('nama_karyawan'),
	    'nik' => set_value('nik'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tgl_masuk_kerja' => set_value('tgl_masuk_kerja'),
	    'jabatan' => set_value('jabatan'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'nama_ibu_kandung' => set_value('nama_ibu_kandung'),
	    'status' => set_value('status'),
	    'jumlah_anak' => set_value('jumlah_anak'),
	    'alamat' => set_value('alamat'),
	    'no_hp' => set_value('no_hp'),
	    'keterangan' => set_value('keterangan'),
	    'foto' => set_value('foto'),
	    'status_aktif' => set_value('status_aktif'),
	);
        $this->load->view('karyawan/karyawan_form', $data);
    }
    
    public function create_action() 
    {

        $upload = $this->Karyawan_model->upload();
            $data = array(
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'nama_ibu_kandung' => $this->input->post('nama_ibu_kandung',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'foto' => $upload['file']['file_name'],
		'status_aktif' => $this->input->post('status_aktif',TRUE),
	    );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawan'));
        
    }
    */
	
		public function tambah(){
		$upload = $this->Karyawan_model->upload();
		$data = array();
		if($this->input->post('submit')){ 
				$this->Karyawan_model->save($upload);
				redirect('karyawan'); 
				// Redirect kembali ke halaman awal / halaman view data
		}
		$this->load->view('karyawan/form', $data);
	}
	
    public function update($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
		'nik' => set_value('nik', $row->nik),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tgl_masuk_kerja' => set_value('tgl_masuk_kerja', $row->tgl_masuk_kerja),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'nama_ibu_kandung' => set_value('nama_ibu_kandung', $row->nama_ibu_kandung),
		'status' => set_value('status', $row->status),
		'jumlah_anak' => set_value('jumlah_anak', $row->jumlah_anak),
		'alamat' => set_value('alamat', $row->alamat),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'foto' => set_value('foto', $row->foto),
		'status_aktif' => set_value('status_aktif', $row->status_aktif),
		'konten' => 'karyawan/karyawan_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() 
    {
		include "cryptz.php";
        $upload = $this->Karyawan_model->upload();
		
            $data = array(
		'nama_karyawan' => md5_encrypt($this->input->post('nama_karyawan',TRUE)),
		'nik' => md5_encrypt($this->input->post('nik',TRUE)),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tgl_masuk_kerja' => md5_encrypt($this->input->post('tgl_masuk_kerja',TRUE)),
		'jabatan' => md5_encrypt($this->input->post('jabatan',TRUE)),
		'tgl_lahir' => md5_encrypt($this->input->post('tgl_lahir',TRUE)),
		'nama_ibu_kandung' => md5_encrypt($this->input->post('nama_ibu_kandung',TRUE)),
		'status' => $this->input->post('status',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'alamat' => md5_encrypt($this->input->post('alamat',TRUE)),
		'no_hp' => md5_encrypt($this->input->post('no_hp',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
		'foto' => md5_encrypt($upload['file']['file_name']),
		'status_aktif' => $this->input->post('status_aktif',TRUE),
	    );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tgl_masuk_kerja', 'tgl masuk kerja', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('nama_ibu_kandung', 'nama ibu kandung', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('jumlah_anak', 'jumlah anak', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('status_aktif', 'status aktif', 'trim|required');

	$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function excel()
    {
    	include "cryptz.php";
        $this->load->helper('exportexcel');
        $namaFile = "karyawan.xls";
        $judul = "karyawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Masuk Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu Kandung");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Anak");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Aktif");

	foreach ($this->Karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->nama_karyawan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->nik));
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->tgl_masuk_kerja));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->jabatan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->tgl_lahir));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->nama_ibu_kandung));
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_anak);
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->alamat));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->no_hp));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->keterangan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->foto));
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=karyawan.doc");

        $data = array(
            'karyawan_data' => $this->Karyawan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('karyawan/karyawan_doc',$data);
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-14 04:26:52 */
/* http://harviacode.com */