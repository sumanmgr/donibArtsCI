<?php 
class Account extends CI_Controller{
	public $data = array();
	function __construct(){
        // Call the Model constructor
        parent::__construct();
	 	if(!$this->session->has_userdata('user')){
	 		redirect(site_url());
	 	}	
	 	else $this->data['user']= $this->session->userdata['user'];
        $this->load->model('user');
	}

	function index(){
	}
	function create_gallery(){
		$this->data['page'] = "newGallery";
  		$this->load->view('mainview', $this->data);
	}
	function booking(){
		$this->data['page'] = "booking";
  		$this->load->view('mainview', $this->data);
	}
	function my_gallery($gallery_id = 0){
		if($gallery_id > 0 ){
			$this->data['page'] = "photoGallery";
		}
		else{
			$this->data['page'] = "listGallery";
		}
  		$this->load->view('mainview', $this->data);	
	}
}
?>