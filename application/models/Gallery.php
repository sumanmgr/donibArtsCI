<?php
class Gallery extends CI_Model{
	function saveGallery($gallery, $bookingId = 0){
		$this->db->insert('gallery', $gallery);
		if ($this->db->affected_rows()	>0){
			$galleryId = $this->db->insert_id();
			if($gallery['gallery_type'] == 1 && $bookingId > 0 ){
				$bookingData = array(
					'galleryId' => $galleryId
					//'last_updated' = ''
				);
				$this->db->where('bookingId', $bookingId);
				$this->db->update('booking');
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
}
?>