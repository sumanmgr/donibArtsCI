
				<div class="page-main ajax-element"><!-- page title -->
					<div class="çontainer">
					<h2 class="section-title double-title">
						View Gallery
					</h2>
                    <?php if($user->user_id == $gallery->photographer_id) :?>
                    <a href="<?php echo site_url('account/editGallery/'.$gallery->gallery_id);  ?>" class="btn btn-primary">Edit Gallery</a>
                    <hr />
					<?php endif; ?>
							<div class="grid-portfolio tj-lightbox-gallery same-ratio-items">
                    		<?php foreach($photos as $photo) : ?>
								<!-- Gallery Item -->		
								<div class="gp-item tj-hover-5">
									<a href="<?php echo site_url('uploads/'.$user->user_id.'/'.$gallery->gallery_id.'/'.$photo->file_name);?>"  class="lightbox-gallery-item">
										<img src="<?php echo site_url('uploads/'.$user->user_id.'/'.$gallery->gallery_id.'/'.$photo->file_name);?>" alt="">
										<!-- Item Overlay -->	
										<div class="tj-overlay"></div>
										<!-- /Item Overlay -->	
									</a>
								</div>
                    
		                    <?php endforeach;?>
							</div>
					<!-- team members -->
                    
					<div class="row mb-xlarge margin-bottom-only">
                    
					<?php /* 
					$count = 0; 
					foreach($photos as $photo) : ?>
                    	<?php if( (($count)%3) == 0) :?>
                        </div>
						<div class="row mb-xlarge  margin-bottom-only">
                        
                        
                        <?php endif; $count++;?>
                    	<div class="team-members">	
							<div class="col-md-4">
								<div class="team-item">
									<div class="team-head">
										<img src="<?php echo site_url('uploads/'.$user->user_id.'/'.$gallery_id.'/'.$photo->file_name);?>" alt="">
										
									</div>

									<div class="team-content">
										<h3 class="title"><?php echo $photo->photo_name?></h3>
										<h4 class="subtitle"><?php echo $photo->photo_description?></h4>
									</div>
                                    
									
								</div>
							</div>
                        </div>
                    <?php endforeach;*/ ?>
						
					</div>
                    
					<hr/>
					<a class="back-to-top" href="#"></a>
				</div>
				</div>
