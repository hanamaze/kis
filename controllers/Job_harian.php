<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_harian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Job_harian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

		$id = $this->session->userdata('id');
        $user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
        $start = intval($this->input->get('start'));
		$date = date('d-m-Y');

        if($this->input->post('cari') != NULL){
                $cari = $this->input->post('cari');
                $tgl = date("d-m-Y");
                $job_selected = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$cari' AND tanggal='$tgl'")->result();
                $job_count = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$cari' AND tanggal='$tgl'")->num_rows();
                $job_user= $this->db->query("SELECT * FROM user WHERE id_user='$cari'")->row();
                
            }else{
                $job_selected = "";
                $job_count = "";
                $job_user= "";
            }
        

        if($user->id_user==1 OR $user->id_user==2 OR $user->id_user==3 OR $user->id_user==4 OR $user->id_user==12){
            if($this->input->post('cari') != NULL){
                $cari = $this->input->post('cari');
                $job_harian_utama = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$cari'")->result();
                $stt=1;
            }else{
                $job_harian_utama = $this->db->get('job_harian')->result();
                $stt=0;
            }
            $job_harian = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$id' AND tanggal='$date' ORDER BY id_job_harian ASC")->result();
        }else{
            $job_harian_utama = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$id'")->result();
            $stt=1; 
            $job_harian = $this->db->query("SELECT * FROM job_harian WHERE id_peserta='$id' AND tanggal='$date' ORDER BY id_job_harian ASC")->result();   
        }
     
        $data = array(
            'job_harian_data' => $job_harian,
            'job_harian_utama' => $job_harian_utama,
            'job_selected' => $job_selected,
            'job_count' => $job_count,
            'job_user' => $job_user,
            'stt' => $stt,
            'start' => $start,
            'konten' => 'job_harian/job_harian_list',
        );
        $this->load->view('index', $data);
    }


    public function detail($id){
        $row = $this->db->query("SELECT * FROM job_harian WHERE id_job_harian='$id'")->row();

        $data = array(
        'id_job_harian' => $row->id_job_harian,
        'id_peserta' => $row->id_peserta,
        'uraian' => $row->uraian,
        'tanggal' => $row->tanggal,
        'start' => $row->start,
        'end' => $row->end,
        'keterangan' => $row->keterangan,
        'color' => $row->color,
        'konten' => 'job_harian/job_harian_detail',
        );
        $this->load->view('index', $data);

    }



    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Job_harian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_job_harian' => $row->id_job_harian,
		'id_peserta' => $row->id_peserta,
		'uraian' => $row->uraian,
		'tanggal' => $row->tanggal,
		'start' => $row->start,
		'end' => $row->end,
		'keterangan' => $row->keterangan,
		'color' => $row->color,
	    );
            $this->load->view('job_harian/job_harian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('job_harian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('job_harian/create_action'),
	    'id_job_harian' => set_value('id_job_harian'),
	    'id_peserta' => set_value('id_peserta'),
	    'uraian' => set_value('uraian'),
	    'tanggal' => set_value('tanggal'),
	    'start' => set_value('start'),
	    'end' => set_value('end'),
	    'keterangan' => set_value('keterangan'),
	    'color' => set_value('color'),
	);
        $this->load->view('job_harian/job_harian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'start' => $this->input->post('start',TRUE),
		'end' => $this->input->post('end',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'color' => $this->input->post('color',TRUE),
	    );

            $this->Job_harian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('job_harian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Job_harian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('job_harian/update_action'),
		'id_job_harian' => set_value('id_job_harian', $row->id_job_harian),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'uraian' => set_value('uraian', $row->uraian),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'start' => set_value('start', $row->start),
		'end' => set_value('end', $row->end),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'color' => set_value('color', $row->color),
	   'konten' => 'job_harian/job_harian_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('job_harian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_job_harian', TRUE));
        } else {
            $data = array(
		'id_peserta' => $this->input->post('id_peserta',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'start' => $this->input->post('start',TRUE),
		'end' => $this->input->post('end',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'color' => $this->input->post('color',TRUE),
	    );

            $this->Job_harian_model->update($this->input->post('id_job_harian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('job_harian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Job_harian_model->get_by_id($id);

        if ($row) {
            $this->Job_harian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('job_harian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('job_harian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
	$this->form_validation->set_rules('uraian', 'uraian', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('start', 'start', 'trim|required');
	$this->form_validation->set_rules('end', 'end', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('color', 'color', 'trim|required');

	$this->form_validation->set_rules('id_job_harian', 'id_job_harian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "job_harian.xls";
        $judul = "job_harian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Peserta");
	xlsWriteLabel($tablehead, $kolomhead++, "Uraian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Start");
	xlsWriteLabel($tablehead, $kolomhead++, "End");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Color");

	foreach ($this->Job_harian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uraian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->start);
	    xlsWriteLabel($tablebody, $kolombody++, $data->end);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->color);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=job_harian.doc");

        $data = array(
            'job_harian_data' => $this->Job_harian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('job_harian/job_harian_doc',$data);
    }

}





