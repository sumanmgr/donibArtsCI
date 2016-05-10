<?php
class Contact extends CI_Controller {
 
  function index(){
  	$data=array(
  		'page' => 'contact'
  	);
	if($this->session->has_userdata('user')){
		$data['user'] = $this->session->userdata['user'];
		$data['visibleUserMenu'] = false;
	}
  	$this->load->view('mainview', $data);
 }
  
}

?>