
				<div class="page-main ajax-element"><!-- page title -->
					<div class="çontainer">
					<h2 class="section-title double-title">
						View Gallery
					</h2>
					
					
					<!-- team members -->
                    
					<div class="row mb-xlarge margin-bottom-only">
                    
					<?php 
					$count = 0; 
					foreach($galleries as $gallery) : ?>
                    	<?php if( (($count)%3) == 0) :?>
                        </div>
						<div class="row mb-xlarge  margin-bottom-only">
                        
                        
                        <?php endif; $count++;?>
                    	<a  href="<?php echo site_url('account/view-gallery/'.$gallery->gallery_id); ?>" class="team-members">	
							<div class="col-md-4">
								<div class="team-item">
									<div class="team-head">
										<img src="<?php echo site_url('assets/img/team/abc.jpg');?>" alt="">
										
									</div>

									<div class="team-content">
										<h3 class="title"><?php echo $gallery->gallery_name?></h3>
										<h4 class="subtitle"><?php echo $gallery->gallery_description?></h4>
									</div>
                                    
									
								</div>
							</div>
                        </a>
                    <?php endforeach;?>
						
					</div>
                    
					<hr/>
					<a class="back-to-top" href="#"></a>
				</div>
				</div>
