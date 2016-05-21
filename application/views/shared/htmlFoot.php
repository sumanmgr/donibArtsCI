			</div>
		</div>
		<?php if(isset($modal)) :
			$this->load->view('modal/'.$modal); 
			endif;
		?>
        <?php if(isset($user)) :
			$this->load->view('modal/userPhoto-modal'); 
			endif;
		?>
		<!-- JavaScript files -->	

		<!-- jquery core -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/jquery-1.11.0.min.js"></script>

		<!-- Bootstrap Js -->
	    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>

		<!-- imagesLoaded jquery plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/imagesloaded.pkgd.min.js"></script>
		
		<!-- jquery isotop plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/isotope.pkgd.min.js"></script>

		<!-- jquery history neede for ajax pages -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/jquery.history.js"></script>

		<!-- owwwlab jquery kenburn slider plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.owwwlab-kenburns.js"></script>

		<!-- owwwlab jquery double carousel plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.owwwlab-DoubleCarousel.js"></script>

		<!-- owwwwlab jquery video background plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.owwwlab-video.js"></script>

		<!-- tweenmax animation framework -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/TweenMax.min.js"></script>

		<!-- jquery nice scroll plugin needed for vertical portfolio page -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/jquery.nicescroll.min.js"></script>

		<!-- jquery magnific popup needed for ligh-boxes -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/jquery.magnific-popup.js"></script>

		<!-- html5 media player -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/mediaelement-and-player.min.js"></script>

		<!-- jquery inview plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/jquery.inview.min.js"></script>

		<!-- smooth scroll -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendors/smoothscroll.js"></script>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en"></script>
		<script type="text/javascript" src="assets/js/vendors/gmap3.min.js"></script>


		<!-- Master Slider -->
		<script src="<?php echo base_url(); ?>assets/masterslider/jquery.easing.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/masterslider/masterslider.min.js"></script>

		<!-- date picker -->        
         <script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.min.js"></script>
         
         <script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.min.js"></script>

		
		<!-- theme custom scripts -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>

		<!-- /JavaScript files -->
        <script>
		$(function () {
			jQuery('[data-toggle="tooltip"]').tooltip();
		    jQuery('#datetimepicker, #datetimepicker2').datetimepicker();
			$("[name='gallery_access']").bootstrapSwitch();
			<?php if(isset($photographer)) : ?>
			$(document).on('change', '#datetimepicker, #datetimepicker2',function(){
				start_date = new Date($('#datetimepicker').val()).getTime();
				end_date   = new Date($('#datetimepicker2').val()).getTime();
				current_time = new Date().getTime();
				timediff = end_date - start_date;
				if(start_date != NaN && end_date != NaN){
					if(start_date > end_date || start_date < current_time){
						$('#bookingStatus').html('Invalid date');
					}
					else if((timediff) < 10800000){ // 10800 == 3 hours
						$('#bookingStatus').html('Booking must be done for at least 3 hours');
					}
					else{
						$.post( "<?php echo site_url("reservations/checkAvailability/".$photographer->user_id); ?>",{stime: start_date, etime: end_date}, function( data ) {
							$('#bookingStatus').html(data);
							cost = 0;
							if(data == 'available'){
								cost = <?php echo $otherdata->perHourRate; ?> * ( timediff / 3600000 );
								 /* convert ms to hour*/	
							$('#total_quote').val(cost);
							}
							
						});
					}
				}
			})
			<?php endif; ?>
		})
		
		$('.make-payment').click( function(){
			$('#form-booking-id').val($(this).data('booking-id'));
			$('#form-booking-quote').val($(this).data('booking-quote'));
		})
        </script>	
		
    </body>
</html>
