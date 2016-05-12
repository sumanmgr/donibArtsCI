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
		$this->db->where('photographer_id',$photogapherId);
		$this->db->order_by('booking_date_time',"DESC");
		$this->db->join('user','user.user_id = booking.customer_id');
		$bookings =  $this->db->get('booking')->result();
		return $bookings;
	
	}
	
	function getBookingById($booking_id){
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
}
?>