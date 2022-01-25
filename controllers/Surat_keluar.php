<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{	
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_keluar_model');
        $this->load->library('form_validation');
		
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_keluar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_keluar/index.html';
            $config['first_url'] = base_url() . 'surat_keluar/index.html';
        }

        $config['total_rows'] = $this->Surat_keluar_model->total_rows($q);
        $surat_keluar = $this->Surat_keluar_model->get_limit_data($q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
		
        $data = array(
            'surat_keluar_data' => $surat_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten' => 'surat_keluar/surat_keluar_list',
        );
        $this->load->view('index', $data);
    }
    public function tahun($a)
    {
        if($this->input->post('submit')){
        $kode = $this->input->post('sortir');
        $surat_keluar = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE status='keluar' AND SUBSTRING(tanggal,7,10)=$a AND kode='$kode' ORDER BY id_surat DESC")->result();
        }else{
        $surat_keluar = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE status='keluar' AND SUBSTRING(tanggal,7,10)=$a ORDER BY id_surat DESC")->result();
        }

        $data = array(
            'surat_keluar_data' => $surat_keluar,
			'start' => 0,
			'konten' => 'surat_keluar/surat_keluar_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Surat_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_surat' => $row->id_surat,
		'no_surat' => $row->no_surat,
		'tanggal' => $row->tanggal,
		'deskripsi' => $row->deskripsi,
		'keterangan' => $row->keterangan,
		'file' => $row->file,
		'id_user' => $row->id_user,
	    );
            $this->load->view('surat_keluar/surat_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_keluar'));
        }
    }
	

	public function tambah(){

		$data = array();
		if($this->input->post('submit') and $this->input->post('kode') != NULL){ 
            $th = SUBSTR($this->input->post('tanggal'),6,9);
            if($th == date('Y')){
				if($this->input->post('pelatihan') != NULL AND $this->session->userdata('id') != NULL){
					$pp = $this->input->post('pelatihan');
					$check = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE deskripsi='$pp'")->row();
					if($check == NULL){
						$this->Surat_keluar_model->save_skl();
						redirect('surat_keluar/tahun/2019');
					}else{
						echo "Data Pelatihan Sudah Diinput, Hubungi Web Master/Programmer untuk Info Lebih Lanjut";
					}
				}else{
					$this->Surat_keluar_model->save();
					redirect('surat_keluar/tahun/2019');
				}
				 
            }else{
                echo "<h3>Data Yang Anda Masukan ".$th."<br> Silahkan Masukan Tahun Sekarang.</h3>";
            }
		}else{
			$this->load->view('surat_keluar/form', $data);
        }  
	}
    
    public function update($id) 
    {
        $row = $this->Surat_keluar_model->get_by_id($id);
		
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_keluar/update_action'),
		'id_surat' => set_value('id_surat', $row->id_surat),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'file' => set_value('file', $row->file),
		'id_user' => set_value('id_user', $row->id_user),
		'akses' => 'tidak',
		'konten' => 'surat_keluar/surat_keluar_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_keluar/tahun/2019'));
        }
    }
    
    public function update_action() 
    {
		include "cryptz.php";
        $upload = $this->Surat_keluar_model->upload();
		
            $data = array(
		'no_surat' => md5_encrypt($this->input->post('no_surat',TRUE)),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'deskripsi' => md5_encrypt($this->input->post('deskripsi',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
		'file' => md5_encrypt($upload['file']['file_name']),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Surat_keluar_model->update($this->input->post('id_surat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect('surat_keluar/tahun/2019');
        
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_keluar_model->get_by_id($id);

        if ($row) {
            $this->Surat_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_keluar/tahun/2019'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('surat_keluar/tahun/2019');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');

	$this->form_validation->set_rules('id_surat', 'id_surat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "surat_keluar.xls";
        $judul = "Surat Keluar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Surat_keluar_model->get_limit_data($q) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
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
        header("Content-Disposition: attachment;Filename=faktur.doc");

        $data = array(
            'surat_data' => $this->Surat_keluar_model->get_limit_data($q),
            'start' => 0
        );
        
        $this->load->view('surat_keluar/surat_keluar_doc',$data);
    }

}

