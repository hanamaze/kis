<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expedisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Expedisi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'expedisi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'expedisi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'expedisi/index.html';
            $config['first_url'] = base_url() . 'expedisi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Expedisi_model->total_rows($q);
        $expedisi = $this->Expedisi_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'expedisi_data' => $expedisi,
            'start' => $start,
            'konten' => 'expedisi/expedisi_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Expedisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_expedisi' => $row->id_expedisi,
		'kepada' => $row->kepada,
		'kurir' => $row->kurir,
		'resi' => $row->resi,
		'tanggal' => $row->tanggal,
		'keterangan' => $row->keterangan,
		'file' => $row->file,
		'status' => $row->status,
	    );
            $this->load->view('expedisi/expedisi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }

    public function create() 
    {
        $data = array(
    'button' => 'Tambah',
    'action' => site_url('expedisi/create_action'),
	'id_expedisi' => set_value('id_expedisi'),
	   'kepada' => set_value('kepada'),
	    'kurir' => set_value('kurir'),
	    'resi' => set_value('resi'),
	    'tanggal' => set_value('tanggal'),
	    'keterangan' => set_value('keterangan'),
	    'file' => set_value('file'),
	    'status' => set_value('status'),
	);
        $this->load->view('expedisi/expedisi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $config['upload_path'] = './data_expedisi/';
		$config['allowed_types'] = 'jpg|png|jpeg|doc|docx|xls|xlsx|pdf';
		$config['max_size']	= '200000';
       // $config['quality']= '50%';
		$config['remove_space'] = TRUE;
        $config['overwrite']=TRUE;
        //$config['max_width'] = 1080; // batas lebar gambar dalam piksel
        //$config['max_height'] = 1080; // batas tinggi gambar dalam piksel
		$this->load->library('upload', $config); // Load konfigurasi uploadnya

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {

            if (!empty($_FILES['file'] )) {
                if ( $this->upload->do_upload('file') ) {
                    $foto = $this->upload->data();

        $data = array(
		'kepada' => $this->input->post('kepada',TRUE),
		'kurir' => $this->input->post('kurir',TRUE),
		'resi' => $this->input->post('resi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Expedisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expedisi'));
        // }

    } else {    echo "kondisi kedua"   }

    }
	


    // public function tambah(){
	// 	$data = array();
		
	// 	if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
	// 		// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
	// 		$upload = $this->Expedisi_model->upload();
			
	// 		if($upload['result'] == "success"){ // Jika proses upload sukses
	// 			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
	// 			$this->Expedisi_model->save($upload);
				
	// 			redirect('expedisi'); // Redirect kembali ke halaman awal / halaman view data
	// 		}else{ // Jika proses upload gagal
	// 			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	// 		}
	// 	}
		
	// 	$this->load->view('expedisi/form', $data);
	// }
	
    //public function tambah2(){
	//	$upload = $this->Expedisi_model->upload();
	//	$data = array();
	//	if($this->input->post('submit')){ 
	//			$this->Expedisi_model->save($upload);
	//			redirect('expedisi'); 
	//			// Redirect kembali ke halaman awal / halaman view data
	//	}
	//	$this->load->view('expedisi/form', $data);
	//}
	
    public function update($id) 
    {
        $row = $this->Expedisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('expedisi/update_action'),
		'id_expedisi' => set_value('id_expedisi', $row->id_expedisi),
		'kepada' => set_value('kepada', $row->kepada),
		'kurir' => set_value('kurir', $row->kurir),
		'resi' => set_value('resi', $row->resi),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'file' => set_value('file', $row->file),
		'status' => set_value('status', $row->status),
		'konten' => 'expedisi/expedisi_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }
    
    public function update_action() 
    {
        $upload = $this->Expedisi_model->upload();
		
        $data = array(
		'kepada' => $this->input->post('kepada',TRUE),
		'kurir' => $this->input->post('kurir',TRUE),
		'resi' => $this->input->post('resi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $upload['file']['file_name'],
		'status' => $this->input->post('status',TRUE),
	    );
            
            $this->Expedisi_model->update($this->input->post('id_expedisi', TRUE), $data);
            unlink(FCPATH."data_expedisi/".$row ->file);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expedisi'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Expedisi_model->get_by_id($id);

        if ($row) {
            $this->Expedisi_model->delete($id);
            unlink(FCPATH."data_expedisi/".$row ->file);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expedisi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expedisi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kepada', 'kepada', 'trim|required');
	$this->form_validation->set_rules('kurir', 'kurir', 'trim|required');
	$this->form_validation->set_rules('resi', 'resi', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_expedisi', 'id_expedisi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "expedisi.xls";
        $judul = "expedisi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kepada");
	xlsWriteLabel($tablehead, $kolomhead++, "Kurir");
	xlsWriteLabel($tablehead, $kolomhead++, "Resi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "File");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Expedisi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kepada);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kurir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->resi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=expedisi.doc");

        $data = array(
            'expedisi_data' => $this->Expedisi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('expedisi/expedisi_doc',$data);
    }

}

/* End of file Expedisi.php */
/* Location: ./application/controllers/Expedisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-23 10:23:34 */
/* http://harviacode.com */