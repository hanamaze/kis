 <?php
 error_reporting(0);
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Profil extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
		ob_start();
        $this->load->model('Profil_model');
        $this->load->library('form_validation');
		
    }
	function index(){

		$data['konten'] = "profil/profil";
		$this->load->view('index',$data);
	}
	
	function ganti_foto(){

		$data['konten'] = "";
		$this->load->view('profil/ganti_foto',$data);
	}
	
	function ganti_password(){

		$data['konten'] = "";
		$this->load->view('profil/ganti_password',$data);
	}
	
	 public function update() 
    {
		include "cryptz.php";
            $data = array(
		'nama' => md5_encrypt($this->input->post('nama',TRUE)),
		'username' => md5_encrypt($this->input->post('username',TRUE)),
		'jabatan' => md5_encrypt($this->input->post('jabatan',TRUE)),
		//'id_user' => $this->$this->session->userdata('id'),
	    );  
            $this->db->where('id_user', $this->session->userdata('id'));
			$this->db->update('user', $data);
            redirect(site_url('profil'));
    }
	
	public function update_foto() 
    {
		include "cryptz.php";
        $upload = $this->Profil_model->upload();
		
            $data = array(
		'foto' => md5_encrypt($upload['file']['file_name']),

	    );

            $this->db->where('id_user', $this->input->post('id_user'));
			$this->db->update('user', $data);
            redirect('profil');
        
    }
	public function update_password() 
    {
		include "cryptz.php";
		$id = $this->session->userdata('id');
		$baru = md5_encrypt($this->input->post('password_baru'));
		$ulang_baru = md5_encrypt($this->input->post('ulang_password_baru'));
		$lama = md5_encrypt($this->input->post('password_lama'));
		$pss = $this->db->query('SELECT * FROM user WHERE id_user='.$this->session->userdata("id").'')->row();
	if($lama == $pss->password){
		if($baru == $ulang_baru){
            $data = array(
		'password' => $baru,
		
		//'id_user' => $this->$this->session->userdata('id'),
	    );  
            $this->db->where('id_user', $this->session->userdata('id'));
			$this->db->update('user', $data);
            redirect(site_url('profil'));
		}else{
			echo "Password Baru Anda Tidak Valid";
		}
	}else{
		echo "Password Anda Salah";
	}
			
    }
	
	
	
}