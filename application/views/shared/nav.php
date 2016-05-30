
			<?php if($this->session->has_userdata('user')) 
                	$menuUser = $this->session->userdata['user'];
            ?>
		
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
							<li><a href="<?php echo site_url(); ?>">Home</a></li>
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
                                    	<?php
                                        $imgSrc = site_url('assets/img/team/abc.jpg');
										if (file_exists('./uploads/'.$user->user_id.'/profile.jpg')){
											$imgSrc = site_url('uploads/'.$user->user_id.'/profile.jpg');
										}
										?>
                                        
										<img src="<?php echo $imgSrc;?>" alt="">
										<ul class="team-socials">
											<li><a href="http://www.facebook.com/<?php echo $user->facebook?>"><i class="fa fa-facebook"></i></a></li>
											<li><a href="http://www.instagram.com/<?php echo $user->instagram?>"><i class="fa fa-instagram"></i></a></li>
											<?php if(isset($menuUser) && $menuUser->user_id == $user->user_id) : ?>
                                            <li> <a href="#" data-toggle="modal" data-target=".addPhoto-modal-lg"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top"  title="Add Prfofile picture"></i></a></li>
                                        	<?php endif; ?>
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
                
                	<?php if(isset($menuUser)) :
                	 ?>
			            <div class="grid-filters-wrapper">
			            
			                <a href="#" class="select-filter"><i class="fa fa-filter"></i> My Menu</a>
			                <ul class="">
			                  <li class="active"><a href="<?php echo site_url("home");?>" data-filter="*">My profile</a></li>
			                  <?php if($menuUser->user_type == 'p') :?>
			                  <li class="active"><a href="<?php echo site_url("booking");?>" data-filter="*">Bookings</a></li>
			                  <li><a href="<?php echo site_url("portfolio");?>" data-filter=".web-design">Portfolio</a></li>
			                  <li><a href="<?php echo site_url("account/view-gallery");?>" data-filter=".web-design">View Gallery</a></li>
			                  <?php else : ?>
			                  <li class="active"><a href="<?php echo site_url("booking");?>" data-filter="*">My Bookings</a></li>
			                  <li><a href="<?php echo site_url("account/view-gallery");?>" data-filter=".web-design">My Gallery</a></li>
			                  <?php endif; ?>
			                  <li><a href="<?php echo site_url("logout");?>">Logout</a></li>
			                </ul>
			            </div>
	        		<?php endif;?>
						</div>
					</div>
				</div>
				<!-- /Sidebar -->
			<?php endif; ?>