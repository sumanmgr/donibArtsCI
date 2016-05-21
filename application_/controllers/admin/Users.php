<?php 
class Users extends CI_Controller{

 function __construct(){
        // Call the Model constructor
        parent::__construct();
 
	 	if( 'login' !== $this->router->fetch_method() && !$this->session->has_userdata('username')){
	 		redirect(site_url('admin/login'));
	 	}	

        $this->load->model('user');
 }

 function index(){
 	$userData = array(
 		'allUsers' => $this->user->getAllUsers(), 
 		);
	$this->load->view('admin/users', $userData); 
 }

 function login(){
 	if($this->session->has_userdata('username')){
 		redirect(site_url('admin/home'));
 	}
 	$adminLogin  = $this->input->post('adminLogin');
 	$adminPass  = $this->input->post('adminPass');

 	if($this->input->post('userlogin')!="" ){
 		if( count($this->user->getUser($adminLogin,$adminPass)) ){
	 		$this->session->set_userdata(array('username' => $adminLogin ));
	 		redirect("admin/home");
	 	}
	 	else {
	 		echo "wrong username";
	 	}
	}

	$this->load->view('admin/shared/htmlHead');
	$this->load->view('admin/login');
	$this->load->view('admin/shared/htmlFoot'); 

 }
 function logout(){
 	if($this->session->has_userdata('username')){
 		unset(
        $_SESSION['username']
		);
 	}
 	redirect(site_url('admin/login'));
 }

}
?>