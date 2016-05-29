<?php class Booking extends CI_Model{
	
	function saveBooking($bookingDetails){
		$this->db->insert('booking', $bookingDetails);
		if ($this->db->affected_rows()	>0){
			return $this->db->insert_id();
		}
		
			return false;
	}
	
	
	function getCustomerBookings($customerId){
		$this->db->where('customer_id',$customerId);
		$this->db->order_by('booking_date_time',"DESC");
		$this->db->join('user','user.user_id = booking.photographer_id');
		$bookings =  $this->db->get('booking')->result();
		return $bookings;
	
	}
	
	
	function getPhotograperBookings($photogapherId){
		$this->db->join('customergallery','customergallery.bookingId = booking.booking_id', 'left');
		$this->db->join('gallery','gallery.gallery_id = customergallery.galleryId', 'left');
		$this->db->where('booking.photographer_id',$photogapherId);
		$this->db->order_by('booking_date_time',"DESC");
		$this->db->join('user','user.user_id = booking.customer_id');
		$bookings =  $this->db->get('booking')->result();
		return $bookings;
	
	}

	function getBookingByPhotographerDate($photogapherId, $start_date, $end_date){
		$query = $this->db->query("SELECT * FROM booking WHERE (('$start_date' <= book_end_date_time AND '$start_date' >= book_start_date_time) OR ('$end_date' <= book_end_date_time AND '$end_date' >= book_start_date_time) OR ('$start_date' <= book_start_date_time AND '$end_date' >= book_end_date_time) OR  ('$start_date' >= book_start_date_time AND '$end_date' <= book_end_date_time) ) AND photographer_id = $photogapherId");
		return $query->result();
	
	}
	
	function getBookingById($booking_id){
		$this->db->where('booking_id', $booking_id);
		return $this->db->get('booking')->row();
	}
	function getBookingByIdWithCustomer($booking_id){
		$this->db->join('user','user.user_id = booking.customer_id');
		$this->db->where('booking_id', $booking_id);
		return $this->db->get('booking')->row();
	}
	
	function updateBooking($bookingData, $booking_id){
		$this->db->where('booking_id', $booking_id);
		$this->db->update('booking', $bookingData);
		
		if ($this->db->affected_rows()	>0){
			return true;
		}
		
			return false;
	}
	
	function makePayment($apymentData){

		$user = $this->session->userdata['user'];


		$this->db->insert('payment', $apymentData);
		if($this->db->affected_rows() > 0 ){
			$this->db->set('booking_status',4);
			$this->db->where('booking_id', $apymentData['booking_id']);
			$this->db->update('booking');
			if($this->db->affected_rows() > 0 ){


				$query = $this->db->query("UPDATE customer SET reward_point = (reward_point+5) WHERE user_id = ".$user->user_id);


				$this->db->query;

				return true;	
			}
			else echo $this->db->last_query();
		}
		return false;
	}
}
?>