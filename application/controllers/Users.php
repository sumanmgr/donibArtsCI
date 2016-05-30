<?php 
class Users extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->model('gallery');
	}
	function checkUsernameAvailability()
	{
		$username = $this->input->post("username");
		$users = $this->user->getUserByUsername($username);
		if(count($users) > 0) echo "not available";
		else echo "available";
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
		 		echo "logged";
		 	}
		 	else {
		 		echo "Login failed! Check your credentials.";
		 	}
		}
	  }
	function view_profile($id = 0){
		$data = array();

		$data['user']      = $this->user->getUserById($id);
		$data['portfolio'] = $this->gallery->getPhotographerPortfolioId($id);
		$data['slides']    = $this->gallery->getPhotoByGallery($data['portfolio']);
		$data['galleries'] = $this->gallery->getPublicPhotographerGalleries($id, 3);
			
		for($i = 0 ; $i<count($data['galleries']); $i++){
			$data['galleries'][$i]->photo = $this->gallery->getRandomPhoto($data['galleries'][$i]->gallery_id);
		}
		$data['otherdata'] = $this->user->getOtherDetail($data['user']);
		$data['page']      = 'logged_home';
	  	$this->load->view('mainview', $data);
	}
}