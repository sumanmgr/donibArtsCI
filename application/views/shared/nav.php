
		
    	<!-- Sidebar -->	
		<div id="side-bar">
			<div class="inner-wrapper">	
				<div id="side-inner">

					<!-- Logo -->	
					<div id="logo-wrapper">
						<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url('assets/img/logo.png');?>" alt="logo"></a>
					</div>
					<!-- /Logo -->	

					<div id="side-contents">

						<!-- Navigation -->	
						<ul id="navigation">
							<li class="menu-item-has-children current-menu-parent"><a href="#">Home</a>
								<ul class="sub-menu">
									<li class="nav-prev"><a href="#"><i class="fa fa-angle-left"></i>Home</a></li>
									<li class="current-menu-item"><a href="<?php echo site_url(); ?>about">ABout</a></li>
									<li><a href="../pages/home-2.html">Fullscreen Portfolio</a></li>
									<li><a href="../pages/home-3.html">Page with MasterSlider</a></li>
									<li><a href="../pages/home-4.html">Animated Captions KenBurn</a></li>
								</ul>
							</li>
							<li><a href="<?php echo site_url(); ?>about">About Us</a></li>

							<li><a href="<?php echo site_url(); ?>photographer">Photographer</a></li>
							<li><a href="<?php echo site_url(); ?>contact">Contact Us</a></li>							

							
						</ul>
						<!-- /Navigation -->	

					</div>	

					<!-- Sidebar footer -->	
					<div id="side-footer">
						<!-- Social icons -->	
						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<!-- /Social icons -->	
						<div id="copyright">
							&copy; Donib Arts 2016
						</div>
					</div>
					<!-- /Sidebar footer -->	

				</div>
			</div>
			
							
		</div>
		<!-- /Sidebar -->	

		
<!-- Page main wrapper -->
		<div id="main-content" class="abs dark-template">
			<div class="page-wrapper">
			<?php if(isset($user) && !(isset($visibleUserMenu) && !($visibleUserMenu)) ) : ?>
				<!-- Sidebar -->
                
				<div class="page-side ajax-element">
					<div class="inner-wrapper vcenter-wrapper">
						<div class="side-content vcenter">
				
                <!-- test -->
                <div class="row mb-xlarge">
						<div class="team-members">	
							<div class="col-md-12">
								<div class="team-item">
									<div class="team-head">
										<img src="<?php echo site_url('assets/img/team/abc.jpg');?>" alt="">
										<ul class="team-socials">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>

									<div class="team-content">
										<h3 class="title"><?php echo $user->fullname?></h3>
										<h4 class="subtitle"> <?php if($user->user_type == 'p') : 
																		echo "Photographer"; 
																		else : echo "Customer"; 
																		endif; ?></h4>
									</div>
									
								</div>
							</div></div></div>
                 <!-- end of div -->
                
                			
							<div class="grid-filters-wrapper">
                            
								<a href="#" class="select-filter"><i class="fa fa-filter"></i> My Menu</a>
								<ul class="">
								  <li class="active"><a href="#" data-filter="*">My profile</a></li>
								  <?php if($user->user_type == 'p') :?>
								  <li class="active"><a href="<?php echo site_url("account/my-booking");?>" data-filter="*">Bookings</a></li>
								  <li><a href="<?php echo site_url("account/create-gallery");?>" data-filter=".web-design">Create Gallery</a></li>
								  <li><a href="<?php echo site_url("account/view-gallery");?>" data-filter=".web-design">View Gallery</a></li>
								  <?php else : ?>
								  <li class="active"><a href="#" data-filter="*">My Booking</a></li>
								  <li><a href="#" data-filter=".web-design">My Gallery</a></li>
								  <?php endif; ?>
								  <li><a href="<?php echo site_url("logout");?>">Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Sidebar -->
			<?php endif; ?>