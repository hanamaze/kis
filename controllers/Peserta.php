<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'peserta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'peserta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'peserta/index.html';
            $config['first_url'] = base_url() . 'peserta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Peserta_model->total_rows($q);
        //$peserta = $this->Peserta_model->get_all();
        $peserta = $this->db->query("SELECT * FROM peserta ORDER BY id_peserta DESC")->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'peserta_data' => $peserta,
            'start' => $start,
            'konten' => 'peserta/peserta_list',
        );
        $this->load->view('index', $data);
        redirect(base_url("pelatihan"));
    }
    public function test(){
    	
		//include "phpqrcode/qrlib.php"; 

		//$tempdir = "foto_peserta/"; 
		//$isi_teks = "B";
		//$namafile = "coba.png";
		//$quality = 'H'; 
		//$ukuran = 5; 
		//$padding = 0;
		//QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
	echo $_SERVER['REQUEST_URI'];
  
    }
	public function crop(){
		
	}

	    public function pelatihan($id_pelatihan)
    {
        $start = intval($this->input->get('start'));


        $peserta = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id_pelatihan' ORDER BY id_peserta DESC")->result();
        $data = array(
            'peserta_data' => $peserta,
            'start' => $start,
            'konten' => 'peserta/peserta_list',
        );
        $this->load->view('index', $data);
    }

    public function read() 
    {
		$id = $this->input->post('id',TRUE);
        $row = $this->Peserta_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peserta' => $row->id_peserta,
		'id_pelatihan' => $row->id_pelatihan,
		'nama_peserta' => $row->nama_peserta,
		'nik' => $row->nik,
		'tempat_tgl_lahir' => $row->tempat_tgl_lahir,
		'perusahaan' => $row->perusahaan,
		'alamat_perusahaan' => $row->alamat_perusahaan,
		'alamat_rumah' => $row->alamat_rumah,
		'no_hp' => $row->no_hp,
		'email' => $row->email,
		'pendidikan' => $row->pendidikan,
		'jabatan' => $row->jabatan,
		'keterangan' => $row->keterangan,
		'pembayaran' => $row->pembayaran,
		'sertifikat' => $row->sertifikat,
	    );
            $this->load->view('peserta/peserta_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peserta/create_action'),
	    'id_peserta' => set_value('id_peserta'),
	    'id_pelatihan' => set_value('id_pelatihan'),
	    'nama_peserta' => set_value('nama_peserta'),
		'nik' => set_value('nik'),
	    'tempat_tgl_lahir' => set_value('tempat_tgl_lahir'),
	    'perusahaan' => set_value('perusahaan'),
	    'alamat_perusahaan' => set_value('alamat_perusahaan'),
	    'alamat_rumah' => set_value('alamat_rumah'),
	    'no_hp' => set_value('no_hp'),
	    'email' => set_value('email'),
	    'pendidikan' => set_value('pendidikan'),
	    'jabatan' => set_value('jabatan'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('peserta/peserta_form', $data);
    }
    
    public function create_action() 
    {
		include "cryptz.php";
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pelatihan' => $this->input->post('id_pelatihan',TRUE),
		'nama_peserta' => md5_encrypt($this->input->post('nama_peserta',TRUE)),
		'nik' => md5_encrypt($this->input->post('nik',TRUE)),
		'tempat_tgl_lahir' => md5_encrypt($this->input->post('tempat_tgl_lahir',TRUE)),
		'perusahaan' => md5_encrypt($this->input->post('perusahaan',TRUE)),
		'alamat_perusahaan' => md5_encrypt($this->input->post('alamat_perusahaan',TRUE)),
		'alamat_rumah' => md5_encrypt($this->input->post('alamat_rumah',TRUE)),
		'no_hp' => md5_encrypt($this->input->post('no_hp',TRUE)),
		'email' => md5_encrypt($this->input->post('email',TRUE)),
		'pendidikan' => md5_encrypt($this->input->post('pendidikan',TRUE)),
		'jabatan' => md5_encrypt($this->input->post('jabatan',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
	    );

            $this->Peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');





$id_peserta = $this->db->query("SELECT * FROM peserta ORDER BY id_peserta DESC")->row();
$id_p = $id_peserta->id_peserta;


$imgname = "foto_peserta/".$id_p.".png";
$data = isset($_GET['data']) ? $_GET['data'] : base_url()."validate/check/".md5($id_p);
$logo = isset($_GET['logo']) ? $_GET['logo'] : base_url().'skl/logo.png';
$sdir = explode("/",$_SERVER['REQUEST_URI']);
$dir = str_replace($sdir[count($sdir)-1],"",$_SERVER['REQUEST_URI']);

// === Create qrcode image
include('phpqrcode/qrlib.php');
QRcode::png($data,$imgname,QR_ECLEVEL_L,11.45,0);

// === Adding image to qrcode
$QR = imagecreatefrompng($imgname);
if($logo !== FALSE){
	$logopng = imagecreatefrompng($logo);
	$QR_width = imagesx($QR);
	$QR_height = imagesy($QR);
	$logo_width = imagesx($logopng);
	$logo_height = imagesy($logopng);
	
	list($newwidth, $newheight) = getimagesize($logo);
	$out = imagecreatetruecolor($QR_width, $QR_width);
	imagecopyresampled($out, $QR, 0, 0, 0, 0, $QR_width, $QR_height, $QR_width, $QR_height);
	imagecopyresampled($out, $logopng, $QR_width/2.65, $QR_height/2.65, 0, 0, $QR_width/4, $QR_height/4, $newwidth, $newheight);
	
}
imagepng($out,$imgname);
imagedestroy($out);

// === Change image color
$im = imagecreatefrompng($imgname);
$r = 44;$g = 62;$b = 80;
for($x=0;$x<imagesx($im);++$x){
	for($y=0;$y<imagesy($im);++$y){
        $index 	= imagecolorat($im, $x, $y);
        $c   	= imagecolorsforindex($im, $index);
        if(($c['red'] < 100) && ($c['green'] < 100) && ($c['blue'] < 100)) { // dark colors
            // here we use the new color, but the original alpha channel
            $colorB = imagecolorallocatealpha($im, 0x12, 0x2E, 0x31, $c['alpha']);
            imagesetpixel($im, $x, $y, $colorB);
        }
	}
}
imagepng($im,$imgname);
imagedestroy($im);

// === Convert Image to base64
$type = pathinfo($imgname, PATHINFO_EXTENSION);
$data = file_get_contents($imgname);
$imgbase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


            redirect(site_url('peserta/pelatihan/'.$this->input->post('id_pelatihan',TRUE)));
        }
    }
	public function choose_skl() 
    {
		$this->load->view("peserta/choose_skl");
	}
	public function choose_sertifikat() 
    {
		$this->load->view("peserta/choose_sertifikat");
	}
	public function choose_absen_idcard() 
    {
		$this->load->view("peserta/choose_absen_idcard");
	}
	public function cetak_all_skl($id) 
    {
		include "cryptz.php";
        ob_start();
        $row = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->row();
        $row_desc = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id' ORDER BY id_peserta DESC")->row();
        $plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
		$nama_plt = md5_decrypt($plt->nama_pelatihan);
        

           // $this->load->view('peserta/skl/peserta_skl_all', $data);
		$p = $this->uri->segment("4");
		$pp = ($this->uri->segment("4")*30);
		if($p==1){
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta;
			}else{
				$tt = $pp + $id_pp;
			}
		}elseif($p==2){
			$id_pp = $row->id_peserta+30;
			$t = $pp + $id_pp-30;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-30;
			}
		}elseif($p==3){
			$id_pp = $row->id_peserta+60;
			$t = $pp + $id_pp-60;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-60;
			}
		}elseif($p==4){
			$id_pp = $row->id_peserta+90;
			$t = $pp + $id_pp-90;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-90;
			}
		}elseif($p==5){
			$id_pp = $row->id_peserta+120;
			$t = $pp + $id_pp-120;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-120;
			}
		}elseif($p==6){
			$id_pp = $row->id_peserta+150;
			$t = $pp + $id_pp-150;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-150;
			}
		}elseif($p==7){
			$id_pp = $row->id_peserta+180;
			$t = $pp + $id_pp-180;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-180;
			}
		}elseif($p==8){
			$id_pp = $row->id_peserta+210;
			$t = $pp + $id_pp-210;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-210;
			}
		}elseif($p==9){
			$id_pp = $row->id_peserta+240;
			$t = $pp + $id_pp-240;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-240;
			}
		}elseif($p==10){
			$id_pp = $row->id_peserta+270;
			$t = $pp + $id_pp-270;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-270;
			}
		}else{
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp;
			}
		}
		if ($row) {
            $data = array(
        'id_pelatihan' => $id,
        'id_pp' => $id_pp,
        'tt' => $tt,
        );
			
			$this->load->view('peserta/skl/peserta_skl_all', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output($nama_plt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
		public function cetak_all_skl2($id) 
    {
				include "cryptz.php";
        ob_start();
        $row = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->row();
        $row_desc = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id' ORDER BY id_peserta DESC")->row();
        $plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
		$nama_plt = md5_decrypt($plt->nama_pelatihan);
        

           // $this->load->view('peserta/skl/peserta_skl_all', $data);
		$p = $this->uri->segment("4");
		$pp = ($this->uri->segment("4")*30);
		if($p==1){
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta;
			}else{
				$tt = $pp + $id_pp;
			}
		}elseif($p==2){
			$id_pp = $row->id_peserta+30;
			$t = $pp + $id_pp-30;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-30;
			}
		}elseif($p==3){
			$id_pp = $row->id_peserta+60;
			$t = $pp + $id_pp-60;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-60;
			}
		}elseif($p==4){
			$id_pp = $row->id_peserta+90;
			$t = $pp + $id_pp-90;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-90;
			}
		}elseif($p==5){
			$id_pp = $row->id_peserta+120;
			$t = $pp + $id_pp-120;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-120;
			}
		}elseif($p==6){
			$id_pp = $row->id_peserta+150;
			$t = $pp + $id_pp-150;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-150;
			}
		}elseif($p==7){
			$id_pp = $row->id_peserta+180;
			$t = $pp + $id_pp-180;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-180;
			}
		}elseif($p==8){
			$id_pp = $row->id_peserta+210;
			$t = $pp + $id_pp-210;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-210;
			}
		}elseif($p==9){
			$id_pp = $row->id_peserta+240;
			$t = $pp + $id_pp-240;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-240;
			}
		}elseif($p==10){
			$id_pp = $row->id_peserta+270;
			$t = $pp + $id_pp-270;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-270;
			}
		}else{
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp;
			}
		}
		if ($row) {
            $data = array(
        'id_pelatihan' => $id,
        'id_pp' => $id_pp,
        'tt' => $tt,
        );
			
			$this->load->view('peserta/skl/peserta_skl_all2', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output($nama_plt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
	public function cetak_all_sertifikat($id) 
    {
		include "cryptz.php";
        ob_start();
        $row = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->row();
        $row_desc = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id' ORDER BY id_peserta DESC")->row();
        $plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
		$nama_plt = md5_decrypt($plt->nama_pelatihan);
        

           // $this->load->view('peserta/skl/peserta_skl_all', $data);
		$p = $this->uri->segment("4");
		$pp = ($this->uri->segment("4")*30);
		if($p==1){
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta;
			}else{
				$tt = $pp + $id_pp;
			}
		}elseif($p==2){
			$id_pp = $row->id_peserta+30;
			$t = $pp + $id_pp-30;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-30;
			}
		}elseif($p==3){
			$id_pp = $row->id_peserta+60;
			$t = $pp + $id_pp-60;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-60;
			}
		}elseif($p==4){
			$id_pp = $row->id_peserta+90;
			$t = $pp + $id_pp-90;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-90;
			}
		}elseif($p==5){
			$id_pp = $row->id_peserta+120;
			$t = $pp + $id_pp-120;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-120;
			}
		}elseif($p==6){
			$id_pp = $row->id_peserta+150;
			$t = $pp + $id_pp-150;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-150;
			}
		}elseif($p==7){
			$id_pp = $row->id_peserta+180;
			$t = $pp + $id_pp-180;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-180;
			}
		}elseif($p==8){
			$id_pp = $row->id_peserta+210;
			$t = $pp + $id_pp-210;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-210;
			}
		}elseif($p==9){
			$id_pp = $row->id_peserta+240;
			$t = $pp + $id_pp-240;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-240;
			}
		}elseif($p==10){
			$id_pp = $row->id_peserta+270;
			$t = $pp + $id_pp-270;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-270;
			}
		}else{
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp;
			}
		}
		if ($row) {
            $data = array(
        'id_pelatihan' => $id,
        'id_pp' => $id_pp,
        'tt' => $tt,
        );
			
			$this->load->view('peserta/skl/peserta_sertifikat_all', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output("sertifikat-cover-".$nama_plt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
		public function cetak_all_sertifikat2($id) 
    {
				include "cryptz.php";
        ob_start();
        $row = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->row();
        $row_desc = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id' ORDER BY id_peserta DESC")->row();
        $plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
		$nama_plt = md5_decrypt($plt->nama_pelatihan);
        

           // $this->load->view('peserta/skl/peserta_skl_all', $data);
		$p = $this->uri->segment("4");
		$pp = ($this->uri->segment("4")*30);
		if($p==1){
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta;
			}else{
				$tt = $pp + $id_pp;
			}
		}elseif($p==2){
			$id_pp = $row->id_peserta+30;
			$t = $pp + $id_pp-30;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-30;
			}
		}elseif($p==3){
			$id_pp = $row->id_peserta+60;
			$t = $pp + $id_pp-60;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-60;
			}
		}elseif($p==4){
			$id_pp = $row->id_peserta+90;
			$t = $pp + $id_pp-90;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-90;
			}
		}elseif($p==5){
			$id_pp = $row->id_peserta+120;
			$t = $pp + $id_pp-120;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-120;
			}
		}elseif($p==6){
			$id_pp = $row->id_peserta+150;
			$t = $pp + $id_pp-150;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-150;
			}
		}elseif($p==7){
			$id_pp = $row->id_peserta+180;
			$t = $pp + $id_pp-180;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-180;
			}
		}elseif($p==8){
			$id_pp = $row->id_peserta+210;
			$t = $pp + $id_pp-210;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-210;
			}
		}elseif($p==9){
			$id_pp = $row->id_peserta+240;
			$t = $pp + $id_pp-240;
			if($t > $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-240;
			}
		}elseif($p==10){
			$id_pp = $row->id_peserta+270;
			$t = $pp + $id_pp-270;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp-270;
			}
		}else{
			$id_pp = $row->id_peserta;
			$t = $pp + $id_pp;
			if($t < $row_desc->id_peserta){
				$tt = $row_desc->id_peserta+1;
			}else{
				$tt = $pp + $id_pp;
			}
		}
		if ($row) {
            $data = array(
        'id_pelatihan' => $id,
        'id_pp' => $id_pp,
        'tt' => $tt,
        );
			
			$this->load->view('peserta/skl/peserta_sertifikat_all2', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output('sertifikat-tanpa-cover-'.$nama_plt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }

	public function cetak_idcard($id) 
    {
		include "cryptz.php";
        ob_start();
        $peserta = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->result();
        $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();

		if ($peserta) {
            $data = array(
        'id_pelatihan' => $id,
        'pst' => $peserta,
        'design' => $pelatihan->idcard,
        );
			
			$this->load->view('peserta/skl/idcard', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','B4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output('idcard-custom-'.md5_decrypt($pelatihan->nama_pelatihan).'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
		public function cetak_idcard_kosong($id) 
    {
		include "cryptz.php";
        ob_start();
        $peserta = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->result();
        $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();

		if ($peserta) {
            $data = array(
        'id_pelatihan' => $id,
        'pst' => $peserta,
        'design' => $pelatihan->idcard,
        );
			
			$this->load->view('peserta/skl/idcard_kosong', $data);
			
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','B4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output('idcard-tanpa-background-'.md5_decrypt($pelatihan->nama_pelatihan).'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
	
		public function cetak_peserta($id) 
    {
		include "cryptz.php";
        ob_start();
		$id_pst = $this->uri->segment(4);
        $row = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id_pst'")->row();
		$nama = md5_decrypt($row->nama_peserta);
        if ($row) {
            $data = array(
         'id' => $this->uri->segment(3),
         'id_peserta' => $this->uri->segment(4),

        );
	
            $this->load->view('peserta/skl/peserta_skl', $data);
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output($id_pst.'_'.$nama.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
		
    }
	
	public function cetak_peserta2($id) 
    {
		include "cryptz.php";
        ob_start();
		$id_pst = $this->uri->segment(4);
        $row = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id_pst'")->row();
		$nama = md5_decrypt($row->nama_peserta);
        if ($row) {
            $data = array(
         'id' => $this->uri->segment(3),
         'id_peserta' => $this->uri->segment(4),

        );
	
            $this->load->view('peserta/skl/peserta_skl2', $data);
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output($id_pst.'_'.$nama.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
		
    }
	public function sertifikat_all2($id) 
    {
		include "cryptz.php";
        ob_start();
        $row = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id'")->row();
        $plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
		$nama_plt = md5_decrypt($plt->nama_pelatihan);
        if ($row) {
            $data = array(
        'id_pelatihan' => $id,
        );

            $this->load->view('peserta/sertifikat_all2', $data);
			
			$html = ob_get_contents(); 
            ob_end_clean();  
            require_once('assets/html2pdf/html2pdf.class.php'); 
            $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(0, 0, 0, 0));    
            $pdf->WriteHTML($html);    
            $pdf->Output($nama_plt.'.pdf', 'D');
				
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peserta/update_action'),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'id_pelatihan' => set_value('id_pelatihan', $row->id_pelatihan),
		'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
		'nik' => set_value('nik', $row->nik),
		'tempat_tgl_lahir' => set_value('tempat_tgl_lahir', $row->tempat_tgl_lahir),
		'perusahaan' => set_value('perusahaan', $row->perusahaan),
		'alamat_perusahaan' => set_value('alamat_perusahaan', $row->alamat_perusahaan),
		'alamat_rumah' => set_value('alamat_rumah', $row->alamat_rumah),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'email' => set_value('email', $row->email),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'foto' => set_value('foto', $row->foto),
	   'konten' => 'peserta/peserta_form' );
		
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta'));
        }
    }
    
    public function update_action() 
    {
		include "cryptz.php";
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
		'id_pelatihan' => $this->input->post('id_pelatihan',TRUE),
		'nama_peserta' => md5_encrypt($this->input->post('nama_peserta',TRUE)),
		'nik' => md5_encrypt($this->input->post('nik',TRUE)),
		'tempat_tgl_lahir' => md5_encrypt($this->input->post('tempat_tgl_lahir',TRUE)),
		'perusahaan' => md5_encrypt($this->input->post('perusahaan',TRUE)),
		'alamat_perusahaan' => md5_encrypt($this->input->post('alamat_perusahaan',TRUE)),
		'alamat_rumah' => md5_encrypt($this->input->post('alamat_rumah',TRUE)),
		'no_hp' => md5_encrypt($this->input->post('no_hp',TRUE)),
		'email' => md5_encrypt($this->input->post('email',TRUE)),
		'keterangan' => md5_encrypt($this->input->post('keterangan',TRUE)),
		'pendidikan' => md5_encrypt($this->input->post('pendidikan',TRUE)),
		'jabatan' => md5_encrypt($this->input->post('jabatan',TRUE)),
	    );

            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peserta/pelatihan/'.$this->input->post('id_pelatihan',TRUE)));
        }
    }
    public function delete_sertifikat($id) 
    {
		include "cryptz.php";
        $this->_rules();
        $id_p = $this->uri->segment(4);
        
            $data = array(
		'sertifikat' => '',
	    );

            $this->Peserta_model->update($id, $data);
            $this->session->set_flashdata('message', 'Deleted Record');
            redirect(site_url('peserta/pelatihan/'.$id_p));
        
    }

    public function update_sert() 
    {
        
        
		$this->load->view('peserta/peserta_sertifikat');


        if($this->input->post('submit')){ 
        $id 		= $this->input->post('id_peserta');    
        $peserta 	= $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id'")->row();
        $id_p 		= $peserta->id_pelatihan;    
        $upload 	= $this->Peserta_model->upload();
            
            if($upload['result'] == "success"){ 
                $this->Peserta_model->save($id,$upload);
                redirect('peserta/pelatihan/'.$id_p); 
            }else{
                $data['message'] = $upload['error']; 
                echo "error";
            }
        }
            
    }
    public function update_idcard() 
    {
        


        if($this->input->post('submit')){ 
        $id 		= $this->input->post('id_pelatihan');    
        $pelatihan	= $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
        $id_p 		= $pelatihan->id_pelatihan;    
        $upload 	= $this->Peserta_model->upload_idcard();
            
            if($upload['result'] == "success"){ 
                $this->Peserta_model->save_idcard($id,$upload);
                redirect('peserta/pelatihan/'.$id); 
            }else{
                $data['message'] = $upload['error']; 
                echo "error";
            }
        }
            
    }
    public function delete($id) 
    {
        $row = $this->Peserta_model->get_by_id($id);
		$id22 = (int)$this->uri->segment('4');

        if ($row) {
            $this->Peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peserta/pelatihan/'.$id22));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peserta/pelatihan/'.$id22));
        }

    }


	public function step($id){
		$a2 = $this->uri->segment("4");
		if($a2==1){
			$this->db->query("UPDATE progress_pelatihan SET progress='2' WHERE id_pelatihan='$id'");
		}else{
			$this->db->query("UPDATE progress_pelatihan SET progress='3' WHERE id_pelatihan='$id'");
		}
		redirect(base_url()."peserta/pelatihan/".$id);
	}
	public function approve($id){
		$a2 = $this->uri->segment("4");
		if($a2==1){
			$this->db->query("UPDATE progress_pelatihan SET approve_1='1' WHERE id_pelatihan='$id'");
		}elseif($a2==2){
			$this->db->query("UPDATE progress_pelatihan SET approve_2='1' WHERE id_pelatihan='$id'");
		}else{
			$this->db->query("UPDATE progress_pelatihan SET approve_3='1' WHERE id_pelatihan='$id'");
		}
		redirect(base_url()."peserta/pelatihan/".$id);
		
	}
	public function pembayaran($id){
		$a2 = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id'")->row();
		if($a2->pembayaran=='lunas'){
			$this->db->query("UPDATE peserta SET pembayaran='belum_lunas' WHERE id_peserta='$id'");
			
		}else{
			$this->db->query("UPDATE peserta SET pembayaran='lunas' WHERE id_peserta='$id'");
			
		}
		redirect(base_url()."peserta/pelatihan/".$a2->id_pelatihan);
		
	}
	
	
    public function _rules() 
    {
	$this->form_validation->set_rules('id_pelatihan', 'id pelatihan', 'trim|required');
	$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	$this->form_validation->set_rules('tempat_tgl_lahir', 'tempat tgl lahir', 'trim|required');
	$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
	$this->form_validation->set_rules('alamat_perusahaan', 'alamat perusahaan', 'trim|required');
	$this->form_validation->set_rules('alamat_rumah', 'alamat rumah', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
    public function excel($id)
    {
		include "cryptz.php";
		$plth = $this->db->query("SELECT * FROM pelatihan")->row();
		$pelatihan = md5_decrypt($plth->nama_pelatihan);
        $this->load->helper('exportexcel');
        $namaFile = $pelatihan.".xls";
        $judul = "peserta";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Rumah");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	
	
	 //$id =  $this->uri->segment(4);
	$peserta = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id' ")->result();
	foreach ($peserta as $data) {
            $kolombody = 0;
			
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->nama_peserta));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->tempat_tgl_lahir));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->perusahaan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->alamat_perusahaan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->alamat_rumah));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->no_hp));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->email));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->pendidikan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->jabatan));
	    xlsWriteLabel($tablebody, $kolombody++, md5_decrypt($data->keterangan));

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
	public function excel2(){
		
		$this->load->view('peserta/peserta_xls');
	}
	public function choose_excel(){
		
		$this->load->view('peserta/choose_xls');
	}
    public function word($id_plt)
    {
		header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=absen_".$id_plt.".doc");
		$aa = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id_plt'");
		$nama_plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$aa->id_pelatihan'")->row();
		$nama_kategori = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$nama_plt->id_kategori_pelatihan'")->row(); 
		
		$abc = $nama_plt->nama_pelatihan;
		$abc2 = $nama_kategori->nama_kategori;
        $data = array(
            'peserta_data' => $aa,
            'pelatihan' => $abc,
            'pelatihan2' => $abc2,
            'start' => 0
        );

        
        $this->load->view('peserta/peserta_doc',$data);
    }

}





