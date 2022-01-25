<?php
class Validate extends CI_Controller{
 	function __construct(){
		parent::__construct();	
		$this->load->library('encrypt');
	}
	
	function check($id){  
        include "cryptz.php";
		
        $a = $this->db->get('peserta')->result();
        foreach($a as $aa){
            if(md5($aa->id_peserta) == $id){
                
                $ids        = $aa->id_peserta;
                $nama       =  md5_decrypt($aa->nama_peserta);
                $plt        =  $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$aa->id_pelatihan'")->row(); 
                $kategori   =  $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$plt->id_kategori_pelatihan'")->row();

            }        
        }

         $data = array(
        'idd' => $ids,
        'nama' => $nama,
        'kategori' => $kategori->deskripsi_sertifikat,
        'kategori_reg' => $kategori->kategori_reg,
        );

        $this->load->view('peserta/validate/validate',$data);
	}

}