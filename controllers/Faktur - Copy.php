<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faktur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faktur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'faktur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'faktur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'faktur/index.html';
            $config['first_url'] = base_url() . 'faktur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Faktur_model->total_rows($q);
        $faktur = $this->Faktur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'faktur_data' => $faktur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'faktur/faktur_list',
        );
        $this->load->view('index', $data);
    }
//read
    public function read() 
    {
        $id = $this->input->post('id',TRUE);
        $row = $this->Faktur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_faktur' => $row->id_faktur,
		'id_user' => $row->id_user,
		'no_faktur' => $row->no_faktur,
		'no_kwitansi' => $row->no_kwitansi,
		'tanggal' => $row->tanggal,
		'uraian' => $row->uraian,
		'jumlah' => $row->jumlah,
		'harga_satuan' => $row->harga_satuan,
		'harga_total' => $row->harga_total,
		'total_in_char' => $row->total_in_char,
		'payment_of' => $row->payment_of,
		'dari' => $row->dari,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'npwp' => $row->npwp,
		'disc' => $row->disc,
		'ppn' => $row->ppn,
		'transaksi' => $row->transaksi,
	    );
            $this->load->view('faktur/faktur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
public function cetak($id) 
    {
        ob_start();
        $row = $this->Faktur_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_faktur' => $row->id_faktur,
		'id_user' => $row->id_user,
		'no_faktur' => $row->no_faktur,
		'no_kwitansi' => $row->no_kwitansi,
		'tanggal' => $row->tanggal,
		'uraian' => $row->uraian,
		'jumlah' => $row->jumlah,
		'harga_satuan' => $row->harga_satuan,
		'harga_total' => $row->harga_total,
		'total_in_char' => $row->total_in_char,
		'payment_of' => $row->payment_of,
		'dari' => $row->dari,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'npwp' => $row->npwp,
		'disc' => $row->disc,
		'ppn' => $row->ppn,
		'transaksi' => $row->transaksi,
        );
            $this->load->view('faktur/faktur_cetak', $data);
           $html = ob_get_contents();        
                ob_end_clean();  

                require_once('/assets/html2pdf/html2pdf.class.php'); 

                $pdf = new HTML2PDF('P','A4','en');    
                $pdf->WriteHTML($html);    
                $pdf->Output($row->no_faktur.'.pdf', 'D');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faktur/create_action'),
	    'id_faktur' => set_value('id_faktur'),
	    'id_user' => set_value('id_user'),
	    'no_faktur' => set_value('no_faktur'),
		'no_kwitansi' => set_value('no_kwitansi'),
	    'tanggal' => set_value('tanggal'),
	    'uraian' => set_value('uraian'),
	    'jumlah' => set_value('jumlah'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'harga_total' => set_value('harga_total'),
	    'total_in_char' => set_value('total_in_char'),
	    'payment_of' => set_value('payment_of'),
	    'dari' => set_value('dari'),
	    'alamat' => set_value('alamat'),
	    'telp' => set_value('telp'),
	    'npwp' => set_value('npwp'),
	    'disc' => set_value('disc'),
	    'ppn' => set_value('ppn'),
	    'transaksi' => set_value('transaksi'),
	);
        $this->load->view('faktur/faktur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			

			
			
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'no_faktur' => $this->input->post('no_faktur',TRUE),
		'no_kwitansi' => $this->input->post('no_kwitansi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'harga_total' => $this->input->post('harga_total',TRUE),
		'total_in_char' => $this->input->post('total_in_char',TRUE),
		'payment_of' => $this->input->post('payment_of',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'disc' => $this->input->post('disc',TRUE),
		'ppn' => $this->input->post('ppn',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
	    );

            $this->Faktur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faktur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faktur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faktur/update_action'),
		'id_faktur' => set_value('id_faktur', $row->id_faktur),
		'id_user' => set_value('id_user', $row->id_user),
		'no_faktur' => set_value('no_faktur', $row->no_faktur),
		'no_kwitansi' => set_value('no_kwitansi', $row->no_kwitansi),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'uraian' => set_value('uraian', $row->uraian),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'harga_total' => set_value('harga_total', $row->harga_total),
		'total_in_char' => set_value('total_in_char', $row->total_in_char),
		'payment_of' => set_value('payment_of', $row->payment_of),
		'dari' => set_value('dari', $row->dari),
		'alamat' => set_value('alamat', $row->alamat),
		'telp' => set_value('telp', $row->telp),
		'npwp' => set_value('npwp', $row->npwp),
		'disc' => set_value('disc', $row->disc),
		'ppn' => set_value('ppn', $row->ppn),
		'transaksi' => set_value('transaksi', $row->transaksi),
        'konten' => 'faktur/faktur_form',
	    );
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_faktur', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'no_faktur' => $this->input->post('no_faktur',TRUE),
		'no_kwitansi' => $this->input->post('no_kwitansi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'harga_total' => $this->input->post('harga_total',TRUE),
		'total_in_char' => $this->input->post('total_in_char',TRUE),
		'payment_of' => $this->input->post('payment_of',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'disc' => $this->input->post('disc',TRUE),
		'ppn' => $this->input->post('ppn',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
	    );

            $this->Faktur_model->update($this->input->post('id_faktur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faktur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faktur_model->get_by_id($id);

        if ($row) {
            $this->Faktur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faktur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
	$this->form_validation->set_rules('no_kwitansi', 'no kwitansi', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	
	$this->form_validation->set_rules('uraian', 'uraian', 'trim|required');
	
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
	$this->form_validation->set_rules('harga_total', 'harga total', 'trim|required');
	$this->form_validation->set_rules('total_in_char', 'total in char', 'trim|required');
	$this->form_validation->set_rules('payment_of', 'payment of', 'trim|required');
	$this->form_validation->set_rules('dari', 'dari', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	$this->form_validation->set_rules('disc', 'disc', 'trim|required');
	$this->form_validation->set_rules('ppn', 'ppn', 'trim|required');
	$this->form_validation->set_rules('transaksi', 'transaksi', 'trim|required');

	$this->form_validation->set_rules('id_faktur', 'id_faktur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "faktur.xls";
        $judul = "Faktur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "No Faktur");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kwitansi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Uraian");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah ");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Dari");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Disc");
	xlsWriteLabel($tablehead, $kolomhead++, "Ppn");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaksi");
	foreach ($this->Faktur_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kwitansi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uraian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_satuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dari);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->disc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ppn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaksi);

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
            'faktur_data' => $this->Faktur_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('faktur/faktur_doc',$data);
    }

}

