<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

    }	
//okooo
	public function index()
	{
		 $data = array(
			'konten' => "admin",
			's_masuk' => $this->Admin_model->s_masuk(),
			's_keluar' => $this->Admin_model->s_keluar(),
			'karyawan' => $this->Admin_model->karyawan(),
			'pelatihan' => $this->Admin_model->pelatihan(),
			'total_p' => $this->Admin_model->peserta(),
			'data' => $this->Admin_model->data_pelatihan(),
        );
		$this->load->view('index',$data);
	}
	

	
}
