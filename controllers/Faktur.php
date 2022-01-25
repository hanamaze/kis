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
        $this->load->library('session');
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


        $config['total_rows'] = $this->Faktur_model->total_rows($q);
        $faktur = $this->Faktur_model->get_limit_data($q);

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
		'satuan' => $row->satuan,
		'harga_total' => $row->harga_total,
		'total_in_char' => $row->total_in_char,
		'payment_of' => $row->payment_of,
		'dari' => $row->dari,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'npwp' => $row->npwp,
		'disc' => $row->disc,
		'transaksi' => $row->transaksi,
	    );
            $this->load->view('faktur/faktur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
	public function optional() 
    {
		$this->load->view('faktur/optional');
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
		'satuan' => $row->satuan,
		'harga_total' => $row->harga_total,
		'total_in_char' => $row->total_in_char,
		'payment_of' => $row->payment_of,
		'dari' => $row->dari,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'npwp' => $row->npwp,
		'disc' => $row->disc,
		'transaksi' => $row->transaksi,
        );
            $this->load->view('faktur/faktur_cetak', $data);
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en');    
            $pdf->WriteHTML($html);    
            $pdf->Output($row->no_faktur.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur'));
        }
    }
	public function cetak2($id) 
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
		'satuan' => $row->satuan,
		'harga_total' => $row->harga_total,
		'total_in_char' => $row->total_in_char,
		'payment_of' => $row->payment_of,
		'dari' => $row->dari,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'npwp' => $row->npwp,
		'disc' => $row->disc,
		'transaksi' => $row->transaksi,
        );
            $this->load->view('faktur/faktur_cetak2', $data);
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
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
	    'tanggal' => set_value('tanggal'),
	    'uraian' => set_value('uraian'),
	    'jumlah' => set_value('jumlah'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'satuan' => set_value('satuan'),
	    'payment_of' => set_value('payment_of'),
	    'dari' => set_value('dari'),
	    'alamat' => set_value('alamat'),
	    'telp' => set_value('telp'),
	    'npwp' => set_value('npwp'),
	    'disc' => set_value('disc'),
	    'transaksi' => set_value('transaksi'),
	);
        $this->load->view('faktur/faktur_form', $data);
    }
    
    public function create_action() 
    {
        
		$this->load->view('faktur/terbilang');
        
		$tahun = SUBSTR($this->input->post('tanggal'),6,9);
		
		$k_f = "Inv-KIS";
		$k_k = "Kwt-KIS";
		$n = $this->db->query("SELECT * FROM faktur WHERE SUBSTRING(tanggal,7,10)='$tahun' ORDER BY no_faktur DESC")->row();
		if($n != NULL){
			
			$u = (string)SUBSTR($n->no_faktur,0,3)+1;
			$urut = str_pad($u, 3, "0", STR_PAD_LEFT);
		}else{
			$urut = "001";
		}
		$bulan = SUBSTR($this->input->post('tanggal'),3,4);
		if($bulan==(int)'01'){
			$B = "I";
		}elseif($bulan==(int)'02'){
			$B = "II";
		}elseif($bulan==(int)'03'){
			$B = "III";
		}elseif($bulan==(int)'04'){
			$B = "IV";
		}elseif($bulan==(int)'05'){
			$B = "V";
		}elseif($bulan==(int)'06'){
			$B = "VI";
		}elseif($bulan==(int)'07'){
			$B = "VII";
		}elseif($bulan==(int)'08'){
			$B = "VIII";
		}elseif($bulan==(int)'09'){
			$B = "IX";
		}elseif($bulan==(int)'10'){
			$B = "X";
		}elseif($bulan==(int)'11'){
			$B = "XI";
		}elseif($bulan==(int)'12'){
			$B = "XII";
		}else{
			echo "error";
		}
			$disc = $this->input->post('disc');
			$satuan = $this->input->post('harga_satuan');
			$jumlah = $this->input->post('jumlah');
			$sub_total = ($satuan * $jumlah)-$disc;
			
	
			$faktur			=	$urut."/".$k_f."/".$B."/".$tahun;
			$kwitansi		=	$urut."/".$k_k."/".$B."/".$tahun;
			$harga_total	=	$sub_total;
			$total_inchar	=	terbilang($harga_total, $style=3);
			

			
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'no_faktur' => $faktur,
		'no_kwitansi' => $kwitansi,
		'tanggal' => $this->input->post('tanggal',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'harga_total' => $harga_total,
		'total_in_char' => $total_inchar,
		'payment_of' => $this->input->post('payment_of',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'disc' => $this->input->post('disc',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
	    );

            $this->Faktur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faktur'));
			
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
		'tanggal' => set_value('tanggal', $row->tanggal),
		'uraian' => set_value('uraian', $row->uraian),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'satuan' => set_value('satuan', $row->satuan),
		'total_in_char' => set_value('total_in_char', $row->total_in_char),
		'payment_of' => set_value('payment_of', $row->payment_of),
		'dari' => set_value('dari', $row->dari),
		'alamat' => set_value('alamat', $row->alamat),
		'telp' => set_value('telp', $row->telp),
		'npwp' => set_value('npwp', $row->npwp),
		'disc' => set_value('disc', $row->disc),
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
        $this->load->view('faktur/terbilang');
			$disc = $this->input->post('disc');
			$satuan = $this->input->post('harga_satuan');
			$jumlah = $this->input->post('jumlah');
			$sub_total = ($satuan * $jumlah)-$disc;

			$harga_total	=	$sub_total;
			$total_inchar	=	terbilang($harga_total, $style=3);
		
            $this->update($this->input->post('id_faktur', TRUE));
        
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'harga_total' => $harga_total,
		'total_in_char' => $total_inchar,
		'payment_of' => $this->input->post('payment_of',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'disc' => $this->input->post('disc',TRUE),
		'transaksi' => $this->input->post('transaksi',TRUE),
	    );

            $this->Faktur_model->update($this->input->post('id_faktur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faktur'));
        }
    public function persetujuan() 
    {
    	//session_start();
    	if($this->input->post('setujui')){
			$id_user = $this->input->post('id_user');
			$id_faktur = $this->input->post('id_faktur');
            $data = array(
				'disetujui_oleh' => $id_user,
	    	);

            $this->Faktur_model->update($id_faktur, $data);
            $this->session->set_flashdata('message', 'Persetujuan Success');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Dari");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Disc");
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
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dari);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->disc);
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

