<?php 
class Users extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('user');
	}
	function checkUsernameAvailability()
	{
		$username = $this->input->post("username");
		$users = $this->user->getUserByUsername($username);
		if(count($users) > 0) echo "not available";
		else echo "available";
	}
	function view_profile($id = 0){
		$data = array();
		$data['user'] = $this->user->getUserById($id);
		$data['otherdata'] = $this->user->getOtherDetail($data['user']);
		$data['page'] = 'logged_home';
	  	$this->load->view('mainview', $data);
	}
}