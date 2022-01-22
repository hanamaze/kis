<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_keluar_model extends CI_Model
{

    public $table = 'surat_masuk_keluar';
    public $id = 'id_surat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
		$this->db->order_by($this->id, $this->order);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

		    // get data by id user
    function get_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->order_by($this->id, $this->order);
	$this->db->where('status','keluar');
	$this->db->from($this->table);

        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($tahun){
	$this->db->order_by($this->id, $this->order);
	$this->db->where('status','keluar');
        return $this->db->get($this->table)->result();
    }
	    // get data with limit and search
    function get_2018(){
	$this->db->order_by($this->id, $this->order);
	$this->db->where('periode','2018');
        return $this->db->get($this->table)->result();
    }
	    // get data with limit and search
    function get_2019(){
	$this->db->order_by($this->id, $this->order);
	$this->db->where('periode','2019');
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg|doc|docx|xls|xlsx|pdf';
		$config['max_size']	= '200000';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Fungsi untuk menyimpan data ke database
	public function save(){
		include "cryptz.php";
		
		$tahun = SUBSTR($this->input->post('tanggal'),6,9);
		$k = md5_encrypt($this->input->post('kode'));
		$n = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE kode='$k' AND SUBSTRING(tanggal,7,10)='$tahun' ORDER BY id_surat DESC")->row();
		if($n != NULL){
			
			$u = (string)SUBSTR(md5_decrypt($n->no_surat),0,3)+1;
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
		$no_surat = ($urut."/".md5_decrypt($k)."/".$B."/".$tahun);
		
		$data = array(
			'no_surat'=>md5_encrypt($no_surat),
			'kode'=>md5_encrypt($this->input->post('kode')),
			'tanggal' => $this->input->post('tanggal'),
			'deskripsi' => md5_encrypt($this->input->post('deskripsi')),
			'keterangan' => md5_encrypt($this->input->post('keterangan')),
			'file' => md5_encrypt("Kosong"),
			'status' => 'keluar',
			'id_user' => $this->input->post('id_user')
		);
		
		$this->db->insert('surat_masuk_keluar', $data);
	}
		public function save_skl(){
			
			
		
		include "cryptz.php";
		$tahun = SUBSTR($this->input->post('tanggal'),6,9);
		$k = md5_encrypt('PJK3-PT.KIS');
		$plthn = $this->input->post('pelatihan');
		$peserta = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$plthn'")->result();
		
		
		foreach($peserta as $ppp){
		$n = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE kode='$k' AND SUBSTRING(tanggal,7,10)='$tahun' ORDER BY id_surat DESC")->row();
		if($n != NULL){
			$u = (string)SUBSTR(md5_decrypt($n->no_surat),0,3)+1;
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
		$no_surat = ($urut."/".md5_decrypt($k)."/".$B."/".$tahun);
		
		
		$data = array(
			'no_surat'=>md5_encrypt($no_surat),
			'kode'=>$k,
			'tanggal' => $this->input->post('tanggal'),
			'deskripsi' => $ppp->id_pelatihan,
			'keterangan' => $ppp->id_peserta,
			'file' => md5_encrypt("Kosong"),
			'status' => 'keluar',
			'id_user' => $this->input->post('id_user')
		);
		
		$this->db->insert('surat_masuk_keluar', $data);
		
		}
		
		
	}

}

