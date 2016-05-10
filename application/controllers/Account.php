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
        $this->load->model('gallery');
	}

	function index(){
		$user =  $this->session->userdata('user');
		var_dump($user);
	}
	function create_gallery(){
		$this->data['page'] = "newGallery";
	  	$data=array(
  			'page' => 'about'
	  	);
		if($this->session->has_userdata('user')){
			$data['user'] = $this->session->userdata['user'];
			$data['visibleUserMenu'] = false;
		}
		if($this->input->post('gallery') == 'newGallery'){
			$gallery = array(
				'gallery_name'        => $this->input->post('galleryName'),
				'gallery_description' => $this->input->post('galleryDescription'),
				'gallery_type'        => $this->input->post('galleryType'),
				'photographer_id'     => $data['user']->user_id,
				
			);
			$bookingId = $this->input->post('galleryBooking');
			
			$galleryId = $this->gallery->saveGallery($gallery, $bookingId);
			
			if($galleryId > 0){
				$this->data['messageType'] = 'success';
				$this->data['message']     = 'Gallery '.$gallery['gallery_name'].' created successfully';
				redirect('account/editGallery/'.$galleryId);
			}
			else{
				$this->data['messageType'] = 'error';
				$this->data['message']     = 'There was a problem creating Gallery. Please try again.';
			}
		}
		
  		$this->load->view('mainview', $this->data);
	}
	function booking($photographerId = 0){
		$this->data['page'] = "booking";
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
			'user'       => $this->session->userdata['user'],
			'gallery'    => $this->gallery->getGallery($id),
	  	);	
		
		if($id>0){
			$this->data['photos'] =  $this->gallery->getPhotoByGallery($id);
		}
		else{
			$this->data['galleries'] =  $this->gallery->getGalleriesByPhotographerId($this->data['user']->user_id);
		}
		
		
		$this->load->view('mainview', $this->data);
	}
	
	function editGallery($id){
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
							$error = array('error' => $this->upload->display_errors());
	
//							$this->load->view('upload_form', $error);
						var_dump($error);
					}
					else
					{
							$photoData = $this->upload->data();
							$this->gallery->savePhoto($gallery->gallery_id, $photoData['file_name']);
	//						$this->load->view('upload_success', $data);
					}
					}			
				}
		  		$this->load->view('mainview', $this->data);
		}
		else echo 'selected gallerty does not exist.';
	}
}
?>