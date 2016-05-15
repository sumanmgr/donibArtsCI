<?php
class Gallery extends CI_Model{
	function saveGallery($gallery, $bookingId = 0){
		$this->db->insert('gallery', $gallery);
		if ($this->db->affected_rows()	>0){
			$galleryId = $this->db->insert_id();
			if($gallery['gallery_type'] == 1 && $bookingId > 0 ){
				$bookingData = array(
					'galleryId' => $galleryId,
					'bookingId' => $bookingId
				);
				$this->db->insert('customergallery', $bookingData);
			}
			return $galleryId;
		}
		
		return false;
	}
	function getGallery($galleryId){
		$this->db->where('gallery_id', $galleryId);
		$query = $this->db->get('gallery');
		return $query->row();
	}
	function getPhotographerPortfolioId($photographerId){
		$this->db->where('PId', $photographerId);
		$tuple = $this->db->get('portfolio')->row();
		return $tuple->galleryID;
	}
	function getGalleryByName($galleryName){
		$this->db->where('gallery_name', $galleryName);
		$query = $this->db->get('gallery');
		return $query->row();
	}
	function getGalleriesByPhotographerId($photographerId){	
		$this->db->where('photographer_id', $photographerId);
		$query = $this->db->get('gallery');
		return $query->result();
	}
	function getPublicPhotographerGalleries($photographerId){
		$this->db->select('gallery.*');
		$this->db->from('gallery');
		$this->db->join('customergallery', 'gallery.gallery_id = customergallery.galleryID');
		$this->db->join('booking', 'customergallery.bookingId = booking.booking_id');
		$this->db->where('booking.gallery_access_type', 1); // public gallery
		$this->db->where('booking.photographer_id', $photographerId);
		return $this->db->get()->result();
	}
	function getCustomerGalleries($customerId){
		$this->db->select('gallery.*');
		$this->db->from('gallery');
		$this->db->join('customergallery', 'gallery.gallery_id = customergallery.galleryID');
		$this->db->join('booking', 'customergallery.bookingId = booking.booking_id');
		$this->db->where('booking.customer_id', $customerId); // public gallery
		return $this->db->get()->result();
		
	}
	function checkCustomerGallery($customerId, $galleryId){
		$this->db->select('booking.customer_id');
		$this->db->from('booking');
		$this->db->where('booking.customer_id', $customerId);
		$this->db->join('customergallery', 'booking.booking_id = customergallery.bookingId');
		$this->db->where('customergallery.galleryID', $galleryId);
		return $this->db->get()->row();
		
		
	}
	function savePhoto($galleryId, $photoName){
		$photoData = array(
			'gallery_id' => $galleryId,
			'photo_name' => $photoName,
			'file_name' => $photoName,
		);
		$this->db->insert('photo', $photoData);
		
		if ($this->db->affected_rows()	>0){
			return $this->db->insert_id();
		}
		return false;
	}
	
	function getPhotoByGallery($galleryId){
		$this->db->where('gallery_id', $galleryId);
		$query = $this->db->get('photo');
		return $query->result();
	}
	function isPublic($galleryId){
		$this->db->join('customergallery', 'booking.booking_id = customergallery.bookingId');
		$this->db->where('customergallery.galleryID', $galleryId); // public gallery
		$this->db->where('booking.gallery_access_type', 1); // public gallery
		return $this->db->get('booking')->row();
	}
	function getRandomPhoto($galleryId){
		$this->db->where('gallery_id', $galleryId);
		return $this->db->get('photo')->row();
	}
}
?>