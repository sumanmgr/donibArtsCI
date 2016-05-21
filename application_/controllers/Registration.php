<?php
class Registration extends CI_Controller{
 function __construct(){
        // Call the Model constructor
        parent::__construct();

        $this->load->model('user');
 }

 function index(){

 	$this->load->library('form_validation');

	$this->form_validation->set_rules('first_name', 'First name', 'required');
	$this->form_validation->set_rules('last_name', 'Last name', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required');			
	$this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
	$this->form_validation->set_rules('password_confirm', 'Confirmation Password', 'required');
	
	if ($this->form_validation->run() == FALSE){
     	echo validation_errors(); die();

    }
    else{	
	 	$newUser = array(
	 		'fullname'  => $this->input->post('first_name').' '.$this->input->post('last_name'), 
	 		'email'     => $this->input->post('email'),
	 		'user_type' => $this->input->post('user_type'), 
	 		'username'  => $this->input->post('username'), 
	 		'password'  => sha1($this->input->post('password'))
	 	);

	 	$newUserId = $this->user->addUser($newUser);

	 	if($newUserId > 0){
	 	//	$this->session->set_userdata($user);
	 		redirect('registration/success');
	 	}
    }



/*	$this->load->view('admin/shared/htmlHead');
	$this->load->view('admin/shared/navbar');
	$this->load->view('admin/shared/sidemenu');
	$this->load->view('admin/home');
	$this->load->view('admin/shared/htmlFoot');
*/ }

  function success(){
	$this->load->view('shared/htmlHead');
	$this->load->view('shared/nav');
	$this->load->view('registrationSuccess');
	$this->load->view('shared/htmlFoot');
  }

  public function login(){
  	if($this->session->has_userdata('user')){
 		redirect(site_url('home'));
 	}
 	$login  = $this->input->post('username');
 	$pass  = $this->input->post('password');

 	if( $login != "" ){
 		$checkUser = $this->user->getUser($login,sha1($pass));
 		if( count($checkUser) ){
	 		$this->session->set_userdata(array('user' => $checkUser[0] ));
	 		redirect("home");
	 	}
	 	else {
	 		echo "wrong username";
	 	}
	}
  }
 function logout(){
 	if($this->session->has_userdata('user')){
 		unset(
        $_SESSION['user']
		);
 	}
 	redirect(site_url('home'));
 }
}
?>