<?php
include "cryptz.php";
class Login extends CI_Controller{

 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}

	function index(){
		$this->load->view('login');
		//echo md5_decrypt("gsRNeXs3IExOAUVgSB3sSjcFOw/8V/tC4D2M4HHWtss=");
		
	}
 
	function aksi_login(){
		$username = md5_encrypt($this->input->post('username'));
		$password = md5_encrypt($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		
		if($cek > 0){			
			$dat = $this->db->query("SELECT * FROM user WHERE username='".$username."' AND password='".$password."'")->result();
			foreach($dat as $data){
				$b = $data->status;
				$idu = $data->id_user;	
			}
			$data_session = array(
				'nama' => $username,
				'status' => $b,
				'id'=>$idu
				);
			$this->session->set_userdata($data_session);
			redirect(base_url("index.php/admin"));
		}else{
			redirect(base_url("login/wrong/"));
		}

	}

 function wrong(){
 		
		$this->load->view('login');
		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}
}