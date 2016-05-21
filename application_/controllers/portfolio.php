<?php
class Portfolio extends CI_Controller {
  function __construct(){
        // Call the Model constructor
        parent::__construct();

        $this->load->model('user');
        $this->load->model('gallery');
 }

  function index($photographerId=0){
	$portfolio = $this->gallery->getGallery($this->gallery->getPhotographerPortfolioId($photographerId));
	$galleries = $this->gallery->getPublicPhotographerGalleries($photographerId);
  	$data=array(
  		'page'    => 'viewGallery',
		'galleries' => array_merge(array($portfolio),$galleries)
  	);
	
	
		for($i = 0 ; $i<count($data['galleries']); $i++){
			$data['galleries'][$i]->photo = $this->gallery->getRandomPhoto($data['galleries'][$i]->gallery_id);
		}
		
	if($this->session->has_userdata('user')){
		$data['user'] = $this->session->userdata['user'];
	}
  	$this->load->view('mainview', $data);
 }
  
}

?>