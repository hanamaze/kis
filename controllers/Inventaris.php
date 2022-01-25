<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Inventaris extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Inventaris_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $start2 = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'inventaris/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'inventaris/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'inventaris/index.html';
            $config['first_url'] = base_url() . 'inventaris/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Inventaris_model->total_rows($q);
        $inventaris = $this->Inventaris_model->get_all();
		
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'inventaris_data' => $inventaris,
            'start' => $start,
            'konten' => 'inventaris/inventaris_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id');
        $row = $this->Inventaris_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'kode_barang' => $row->kode_barang,
		'nama_barang' => $row->nama_barang,
		'kategori' => $row->kategori,
		'lokasi' => $row->lokasi,
		'harga' => $row->harga,
		'jumlah' => $row->jumlah,
		'tanggal' => $row->tanggal,
		'merk' => $row->merk,
		'keterangan' => $row->keterangan,
		'kondisi' => $row->kondisi,
	    );
            $this->load->view('inventaris/inventaris_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inventaris'));
        }
    }
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('inventaris/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'kategori' => set_value('kategori'),
	    'lokasi' => set_value('lokasi'),
	    'harga' => set_value('harga'),
	    'jumlah' => set_value('jumlah'),
	    'tanggal' => set_value('tanggal'),
	    'merk' => set_value('merk'),
	    'keterangan' => set_value('keterangan'),
	    'kondisi' => set_value('kondisi'),
	);
        $this->load->view('inventaris/inventaris_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
	    );
            $this->Inventaris_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('inventaris'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Inventaris_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('inventaris/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'kategori' => set_value('kategori', $row->kategori),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'harga' => set_value('harga', $row->harga),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'merk' => set_value('merk', $row->merk),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'kondisi' => set_value('kondisi', $row->kondisi),
		'konten' => 'inventaris/inventaris_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inventaris'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
	    );

            $this->Inventaris_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('inventaris'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Inventaris_model->get_by_id($id);

        if ($row) {
            $this->Inventaris_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('inventaris'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inventaris'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "inventaris.xls";
        $judul = "inventaris";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");

	foreach ($this->Inventaris_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=inventaris.doc");
        $data = array(
            'inventaris_data' => $this->Inventaris_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('inventaris/inventaris_doc',$data);
    }

}

/* End of file Inventaris.php */
/* Location: ./application/controllers/Inventaris.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-23 10:23:38 */
/* http://harviacode.com */