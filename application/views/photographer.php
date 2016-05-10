
					<div class="container">
					<h2 class="section-title double-title">
						View Photographers
					</h2>
					
					
					<!-- team members -->
                    
					<div class="row mb-xlarge margin-bottom-only">
                    
					<?php 
					$count = 0; 
					foreach($photographers as $photographer) : ?>
                    	<?php if( (($count)%3) == 0) :?>
                        </div>
						<div class="row mb-xlarge  margin-bottom-only">
                        
                        
                        <?php endif; $count++;?>
                    	<div class="team-members">	
							<div class="col-md-4">
								<div class="team-item">
									<div class="team-head">
										<img src="<?php echo site_url('assets/img/team/abc.jpg');?>" alt="">
                                        <ul class="team-socials">
											<li><a href="<?php echo site_url('account/booking/'.$photographer->user_id);?>"><i class="fa fa-plus" data-toggle="tooltip" data-placement="left"  title="Book Now"></i></a></li>
										</ul>
									</div>

									<div class="team-content">
										<h3 class="title"><?php echo $photographer->fullname?></h3>
									</div>
                                    
									
								</div>
							</div>
                        </div>
                    <?php endforeach;?>
						
					</div>
                    
					<hr/>
					<a class="back-to-top" href="#"></a>
				</div>
