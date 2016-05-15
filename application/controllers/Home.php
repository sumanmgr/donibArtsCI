<?php
class Home extends CI_Controller {
 
  function index(){
	$this->load->model('user');
	
  	$data=array(
  	);

	if($this->session->has_userdata('user')){
		$data['user'] = $this->session->userdata['user'];
		
		if($this->input->post('update')=='post'){
						
			$user = array(
				'fullname'  => $this->input->post('full_name'), 
				'email'     => $this->input->post('email'),
				'mobile'    => $this->input->post('mobile'),
				'address'   => $this->input->post('address'),
				'facebook'  => $this->input->post('facebook'),
				'instagram' => $this->input->post('instagram'),
			);
			if($data['user']->user_type == 'p'){
				$datavalue = $this->input->post('experties');
			}
			else{	
				$datavalue = $this->input->post('refrence');
			}
			if($this->user->updateUser($user, $data['user'], $datavalue)){
		 		$this->session->set_userdata(array('user' => $this->user->getUserById($data['user']->user_id) ));
				
				$data['user'] = $this->session->userdata['user'];
			}
		}
		
		$data['modal'] = 'editProfile-modal';		
		$data['page'] = 'logged_home';
		if($data['user']->user_type == 'c'){ 
			$data['rewardData'] = $this->user->getRewardData($data['user']->user_id); 
		}
	}
	else{
		$data['modal'] = 'userlogin-modal';		
		$data['page'] = 'home';		
	}	
  	$this->load->view('mainview', $data);
  
}



}

?>