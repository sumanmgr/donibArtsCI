<?php
class Photographer extends CI_Controller {
  function __construct(){
        // Call the Model constructor
        parent::__construct();

        $this->load->model('user');
 }

  function index(){
  	$data=array(
  		'page' => 'photographer'
  	);
	if($this->session->has_userdata('user')){
		$data['user'] = $this->session->userdata['user'];
		$data['photographers'] = $this->user->getAllPhotographers();
		$data['visibleUserMenu'] = false;
	}
  	$this->load->view('mainview', $data);
 }
  
}

?>