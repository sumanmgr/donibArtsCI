<?php
class Home extends CI_Controller {
 
  	public $data=array();
	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->load->model('user');
		if($this->session->has_userdata('user')){
			$this->data['user']      = $this->session->userdata['user'];
		}
	}

  function index(){
	$this->load->model('gallery');
	

	if($this->session->has_userdata('user')){
		if($this->data['user']->user_type == 'p'):
			$this->data['portfolio'] = $this->gallery->getPhotographerPortfolioId($this->data['user']->user_id);
			$this->data['slides']    = $this->gallery->getPhotoByGallery($this->data['portfolio']);
			$this->data['galleries'] = $this->gallery->getPublicPhotographerGalleries($this->data['user']->user_id, 3);
			for($i = 0 ; $i<count($this->data['galleries']); $i++){
				$this->data['galleries'][$i]->photo = $this->gallery->getRandomPhoto($this->data['galleries'][$i]->gallery_id);
			}
		endif;

		
		$this->data['otherdata'] = $this->user->getOtherDetail($this->data['user']);
		$this->data['modal'] = 'editProfile-modal';		
		$this->data['page'] = 'logged_home';
		if($this->data['user']->user_type == 'c'){ 
			$this->data['rewardData'] = $this->user->getRewardData($this->data['user']->user_id); 
		}
	}
	else{
		$this->data['modal'] = 'userlogin-modal';		
		$this->data['page'] = 'home';		
	}	
  	$this->load->view('mainview', $this->data);
  
}

	function profileUpdate(){

 	$this->load->library('form_validation');
	$this->form_validation->set_rules('full_name', 'Full name', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|exact_length[10]');			
	$this->form_validation->set_rules('address', 'Address', 'required|alpha_dash');
	
	if ($this->form_validation->run() == FALSE){
     	echo validation_errors(); die();
    }
    else{	
						
			$user = array(
				'fullname'  => $this->input->post('full_name'), 
				'email'     => $this->input->post('email'),
				'mobile'    => $this->input->post('mobile'),
				'address'   => $this->input->post('address'),
				'facebook'  => $this->input->post('facebook'),
				'instagram' => $this->input->post('instagram'),
			);

			if($this->data['user']->user_type == 'p'){
				$datavalue = array(
				'experties'   =>$this->input->post('experties'),
				'perHourRate' =>$this->input->post('perHourRate'),
				);
				
			}
			else{	
				$datavalue = $this->input->post('refrence');
			}

			if($this->user->updateUser($user, $this->data['user'], $datavalue)){
		 		$this->session->set_userdata(array('user' => $this->user->getUserById($this->data['user']->user_id) ));
				$this->data['user'] = $this->session->userdata['user'];
				echo "success";
			}

		}		
	}

}

?>