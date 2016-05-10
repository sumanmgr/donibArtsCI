			</div>
		</div>
		<?php if(isset($modal)) :
			$this->load->view('modal/userlogin-modal'); 
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
		
		<!-- theme custom scripts -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>

		<!-- /JavaScript files -->
        <script>
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
        </script>	
		
    </body>
</html>
