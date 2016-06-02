<?php 
class Reservations extends CI_Controller{
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
	
	function book($photographerId = 0){
		$data['modal'] = 'payment-modal';		
		
		$this->data['page'] = "booking";
		$this->data['photographer'] = $this->user->getPhotographerById($photographerId);
		$this->data['otherdata'] = $this->user->getOtherDetail($this->data['photographer']);
		
		if($this->input->post('photographer_id') > 0){
		 	$this->load->library('form_validation');
			$this->form_validation->set_rules('bookingTitle', 'Booking Title', 'required');
			$this->form_validation->set_rules('book_start_date_time', 'Booking Date start time', 'required');
			$this->form_validation->set_rules('book_end_date_time', 'Booking Date end time', 'required|valid_email');			
			
			if ($this->form_validation->run() == FALSE){
		     	echo validation_errors(); die();
		    }
		    else{	
				$bookingDetail = array(
					'book_start_date_time' => $this->input->post('startDateTime'),
					'book_end_date_time'   => $this->input->post('endDateTime'),
					'booking_status'       => 0,
					'booking_title'        => $this->input->post('bookingTitle'),
					'customer_id'          => $this->data['user']->user_id,
					'photographer_id'      => $this->input->post('photographer_id'),
					'booking_details'      => $this->input->post('bookingDescription'),
					'gallery_access_type'  => isset($_POST['gallery_access']) ? 1 : 0,
					'booking_quote'        => $this->input->post('total_quote')
				);
				$bookingId = $this->booking->saveBooking($bookingDetail);
				if($bookingId > 0 ) {
					echo "success";
					$this->session->set_flashdata('booking', 'success.');
				}
				else echo "An error occured while booking your selected photograper. <br /> Please try again later";
				die();
			}
		}
		
  		$this->load->view('mainview', $this->data);
	}
	
	function index(){
		
		$this->data['page']  = "my_booking";
		$this->data['modal'] = 'payment-modal';
		
		$this->data['bookings'] = 
			($this->data['user']->user_type == 'c')								?
			$this->booking->getCustomerBookings($this->data['user']->user_id)   :
			$this->booking->getPhotograperBookings($this->data['user']->user_id);   
			
				
  		$this->load->view('mainview', $this->data);
	}
	
	function cancel_booking($booking_id = 0){
		if($booking_id >0){
			$booking_data = array(
				'booking_status' =>  ($this->data['user']->user_type == 'c') ? 2 : 3,
			);
			$booking = $this->booking->getBookingById($booking_id);
			
			if($booking && ( $booking->customer_id == $this->data['user']->user_id || $booking->photographer_id == $this->data['user']->user_id ) && $booking->booking_status == 0 ){
				$this->booking->updateBooking($booking_data, $booking_id);
			}
		}
		redirect("booking");
	}
	
	function accept_booking($booking_id = 0){
		if($booking_id >0){
			$booking_data = array(
				'booking_status' =>  1 ,
			);
			$booking = $this->booking->getBookingById($booking_id);
			
			if($booking && $booking->photographer_id == $this->data['user']->user_id  && $booking->booking_status == 0 ){
				$this->booking->updateBooking($booking_data, $booking_id);
			}
		}
		redirect("booking");
	}
	
	function make_payment(){
		$payment_data = array();
		$payment_data['booking_id']   = $this->input->post('booking_id');
		$payment_data['amount']       = $this->input->post('amount');
		$payment_data['payment_mode'] = $this->input->post('payment_mode');
		$payment_data['isSuccess']    = 1;
		if($this->booking->makePayment($payment_data))
			redirect ('booking');
		else echo "Error making payment";
	}

	function checkAvailability($photographer){
		$start_date = $this->input->post('stime');
		$end_date   = $this->input->post('etime');

		$bookings = $this->booking->getBookingByPhotographerDate($photographer, $start_date, $end_date);
		if(count($bookings) > 0) echo "not available";
		else echo "available";
	}
}
