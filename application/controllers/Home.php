<?php
class Home extends CI_Controller {
 
  function index(){

  	$data=array(
  	);

	if($this->session->has_userdata('user')){
		$data['user'] = $this->session->userdata['user'];
		$data['page'] = 'logged_home';
	}
	else{
		$data['modal'] = 'userlogin-model';		
		$data['page'] = 'home';		
	}	
  	$this->load->view('mainview', $data);
  
}}

?>