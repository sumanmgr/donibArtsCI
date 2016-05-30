<?php 
class Account extends CI_Controller{
	public $data = array();
	function __construct(){
        // Call the Model constructor
        parent::__construct();
			
	 	if(!$this->session->has_userdata('user')){
			if($this->router->fetch_method() != 'view_gallery' )
	 		redirect(site_url());
	 	}	
	 	else $this->data['user']= $this->session->userdata['user'];
        $this->load->model('user');
        $this->load->model('gallery');
        $this->load->model('booking');
	}

	function index(){
		$user =  $this->session->userdata('user');
		var_dump($user);
	}
	function create_gallery($bookingId = 0){
		$this->data['page'] = "newGallery";
		if($this->input->post('gallery') == 'newGallery'){
			$gallery = array(
				'gallery_name'        => $this->input->post('galleryName'),
				'gallery_description' => $this->input->post('galleryDescription'),
				'gallery_type'        => $this->input->post('galleryType'),
				'photographer_id'     => $this->data['user']->user_id,
				
			);
			$bookingId = $this->input->post('galleryBooking');
			
			$galleryId = $this->gallery->saveGallery($gallery, $bookingId);
			
			if($galleryId > 0){
				$this->data['messageType'] = 'success';
				$this->data['message']     = 'Gallery '.$gallery['gallery_name'].' created successfully';
				redirect('account/edit-gallery/'.$galleryId);
			}
			else{
				$this->data['messageType'] = 'error';
				$this->data['message']     = 'There was a problem creating Gallery. Please try again.';
			}
		}
		if($bookingId >0 )
		$this->data['booking'] = $this->booking->getBookingByIdWithCustomer($bookingId);
  		$this->load->view('mainview', $this->data);
	}
	function gallery($gallery_id = 0){
		if($gallery_id > 0 ){
			$this->data['page'] = "photoGallery";
		}
		else{
			$this->data['page'] = "listGallery";
		}
  		$this->load->view('mainview', $this->data);	
	}
	
	function view_gallery( $id = 0 ){
		
		$this->data=array(
  			'page'       => $id > 0 ? 'viewAlbum' : 'viewGallery',
	  	);	
		if($this->session->has_userdata('user'))
			$this->data['user'] = $this->session->userdata['user'];
			
		if($id>0){
			$this->data['gallery'] = $this->gallery->getGallery($id);
			
			if(
				$this->gallery->isPublic($id) //gallery is public
				|| 
				($this->data['gallery']->gallery_type==0) //gallery is portfolio // accessible to everyone
				|| 
				($this->session->has_userdata('user') && $this->data['user']->user_id == $this->data['gallery']->photographer_id) // gallery is created by photograper
				||
				($this->session->has_userdata('user') && $this->gallery->checkCustomerGallery($this->data['user']->user_id, $id))
			)
				$this->data['photos']  =  $this->gallery->getPhotoByGallery($id);
			else redirect(site_url('home'));
		}
		else{
			
			$this->data['galleries'] = $this->data['user']->user_type == 'p' ? $this->gallery->getGalleriesByPhotographerId($this->data['user']->user_id) : $this->gallery->getCustomerGalleries($this->data['user']->user_id);
			for($i = 0 ; $i<count($this->data['galleries']); $i++){
				$this->data['galleries'][$i]->photo = $this->gallery->getRandomPhoto($this->data['galleries'][$i]->gallery_id);
			}
		}
		
		
		$this->load->view('mainview', $this->data);
	}
	
	function updatePicture(){	
			$this->data['user'] = $this->session->userdata['user'];
			if($this->input->post('post') == 'addPhoto'){
				if (!is_dir('./uploads/'.$this->data['user']->user_id)) {
					mkdir('./uploads/' .$this->data['user']->user_id, 0777, TRUE);
				}
				$config['upload_path'] = './uploads/'.$this->data['user']->user_id.'/';
				
				$config['allowed_types'] = 'jpg';
				$config['max_size']	= '6000';
				$config['max_width']  = '6000';
				$config['max_height']  = '4000';
				$config['overwrite']  = TRUE;
				$config['file_name']  = 'profile.jpg';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('profilePic'))
				{
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
				}
				redirect(site_url('home'));
			
		}
		
		
	}
	
	function edit_gallery($id = 0){
		if($id == 0) $id = $this->gallery->getPhotographerPortfolioId($this->data['user']->user_id);
		$gallery = $this->gallery->getGallery($id);	  	
		$this->data=array(
  			'page' => 'editGallery',
			'gallery' => $gallery
	  	);
		if($this->session->has_userdata('user')){
			$this->data['user'] = $this->session->userdata['user'];
		}
		if($gallery != null ){
			if($this->input->post('post') == 'addPhotos'){
				if (!is_dir('./uploads/'.$this->data['user']->user_id)) {
					mkdir('./uploads/' .$this->data['user']->user_id, 0777, TRUE);
				}
				if (!is_dir('./uploads/'.$this->data['user']->user_id.'/'.$gallery->gallery_id)) {
					mkdir('./uploads/' .$this->data['user']->user_id.'/'.$gallery->gallery_id, 0777, TRUE);
				}
				$this->load->helper(array('form'));
				$files = $_FILES;
				$cpt = count($_FILES['filesToUpload']['name']);
				
                $config['upload_path']          = './uploads/' .$this->data['user']->user_id.'/'.$gallery->gallery_id;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5200;
                $config['max_width']            = 6000;
                $config['max_height']           = 4000;

                $this->load->library('upload', $config);
				
				for($i=0; $i<$cpt; $i++)
				{           
					$_FILES['fileToUpload']['name']= $files['filesToUpload']['name'][$i];
					$_FILES['fileToUpload']['type']= $files['filesToUpload']['type'][$i];
					$_FILES['fileToUpload']['tmp_name']= $files['filesToUpload']['tmp_name'][$i];
					$_FILES['fileToUpload']['error']= $files['filesToUpload']['error'][$i];
					$_FILES['fileToUpload']['size']= $files['filesToUpload']['size'][$i];    			
					if ( ! $this->upload->do_upload('fileToUpload'))
					{
							$this->data['error'] = array('error' => $this->upload->display_errors());
	
//							$this->load->view('upload_form', $error);
						
					}
					else
					{
							$photoData = $this->upload->data();
							$this->data['imagesuccess'] = " images added successfully";
							$this->gallery->savePhoto($gallery->gallery_id, $photoData['file_name']);
	//						$this->load->view('upload_success', $data);
					}
					}			
				}
				$this->data['gallery'] = $this->gallery->getGallery($id);
			
				$this->data['photos']  =  $this->gallery->getPhotoByGallery($id);


		  		$this->load->view('mainview', $this->data);
		}
		else echo 'selected gallerty does not exist.';
	}
}
?>