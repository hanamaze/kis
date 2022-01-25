 <?php
class Restrict extends CI_Controller{



	function index(){
		
		$data = array(

			'konten' => 'restrict',
        );
        $this->load->view('index', $data);
 
	}
}