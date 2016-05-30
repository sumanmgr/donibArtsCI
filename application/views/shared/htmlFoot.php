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


		<!-- Master Slider -->
		<script src="<?php echo base_url(); ?>assets/masterslider/jquery.easing.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/masterslider/masterslider.min.js"></script>

		<!-- date picker -->        
         <script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.min.js"></script>
         
         <script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.min.js"></script>

		
		<!-- theme custom scripts -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en"></script>
		<script type="text/javascript" src="assets/js/vendors/gmap3.min.js"></script>


		<!-- /JavaScript files -->
        <script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		    $('#datetimepicker, #datetimepicker2').datetimepicker();
			$("[name='gallery_access']").bootstrapSwitch();


			$('#registrationButton').prop("disabled", true);
			$(document).on('keyup', '#inputUsername',function(){
				username = $("#inputUsername").val();
				$.post( "<?php echo site_url("users/checkUsernameAvailability"); ?>",{'username': username}, function( data ) {
							cost = 0;
							if(data == 'available'){
								$('#userAvailability').html("<i class='fa fa-check'></i> Username available");
								$('#registrationButton').prop("disabled", false);
							}
							else{
								$('#userAvailability').html("<i class='fa fa-times'></i> Username not available");
								$('#registrationButton').prop("disabled", true);
							}
							
				});
			})


			<?php if(isset($photographer)) : ?>
			$('#bookingButton').prop("disabled", true);

			$(document).on('change', '#datetimepicker, #datetimepicker2',function(){
				start_date = $('#datetimepicker').val();
				end_date   = $('#datetimepicker2').val();
				console.log(start_date);
				
				start_date_timestamp = new Date($('#datetimepicker').val()).getTime();
				end_date_timestamp   = new Date($('#datetimepicker2').val()).getTime();
				
				current_time = new Date().getTime();
				timediff = end_date_timestamp - start_date_timestamp;

				console.log(timediff);
				if(start_date != "" && end_date != ""){
					if(start_date_timestamp > end_date_timestamp || start_date_timestamp < current_time){
						$('#bookingStatus').html('Invalid date');
						$('#bookingButton').prop("disabled", true);
					}
					else if((timediff) < 10800000){ // 10800 == 3 hours
						$('#bookingStatus').html('Booking must be done for at least 3 hours');
						$('#bookingButton').prop("disabled", true);
					}
					else{
						$.post( "<?php echo site_url("reservations/checkAvailability/".$photographer->user_id); ?>",{stime: start_date, etime: end_date}, function( data ) {
							$('#bookingStatus').html(data);
							cost = 0;
							if(data == 'available'){
								cost = <?php echo $otherdata->perHourRate; ?> * ( timediff / 3600000 );
								$('#bookingButton').prop("disabled", false);
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

		jQuery.fn.scrollTo = function(elem, speed) { 
		    $(this).animate({
		        scrollTop:  $(this).scrollTop() - $(this).offset().top + $(elem).offset().top 
		    }, speed == undefined ? 1000 : speed); 
		    return this; 
		};


	$("body").on("click",".back-to-top",function(e){
		e.preventDefault();
		$(".page-wrapper").scrollTo(".scroll-destination", 2000); //custom animation speed 
//		$(".page-main").scrollTo(".container", 2000); //custom animation speed 
	});

        </script>	
		
    </body>
</html>
