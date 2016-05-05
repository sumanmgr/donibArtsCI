<?php
class Home extends CI_Controller {
 function __construct(){
        // Call the Model constructor
        parent::__construct();

	 	if(!$this->session->has_userdata('username')){
	 		redirect(site_url('admin/login'));
	 	}	

        $this->load->model('user');
 }

 function index(){
	$this->load->view('admin/shared/htmlHead');
	$this->load->view('admin/shared/navbar');
	$this->load->view('admin/shared/sidemenu');
	$this->load->view('admin/home');
	$this->load->view('admin/shared/htmlFoot');
 }

}

?>