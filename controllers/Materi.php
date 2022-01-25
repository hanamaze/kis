<?php
error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function index()
    {
		//redirect('https://drive.google.com/drive/folders/1LE8PT5TgpsfEkemg2tn7B2cOt4b9NpBL?usp=sharing');
		//$link = $this->db->query("SELECT * FROM setting WHERE id_setting='2' OR id_setting='3' OR id_setting='4' AND status='1'")->result();
		//echo "<h1>MATERI PELATIHAN</h1>";
		
		//foreach($link as $l){
		//if($l->status==1){	
		//	echo "<a href='".$l->info."'>".$l->nama_setting."</a><br>";
		//}
		//}

    	$this->load->view("materi/materi");
    }

   

}