				<div class="page-main ajax-element"><!-- page title -->
                
					<div class="çontainer no-row-margin">
                        <h2 class="section-title double-title">
                            <span></span><?php echo $gallery->gallery_name;?>
                        </h2>
                        <form method="post"  enctype="multipart/form-data">
                        	<fieldset>
                            <div class="form-group">
                            <h3>Please Uploade Files for the Gallery</h3>
                                <input name="filesToUpload[]" class="form_control" id="filesToUpload" type="file" multiple="" value="Choose Pictures...." />
                                <small class="text-muted">Choose multiple files from your local folder.</small>
                            </div>
	                        <div class="form-group">
	                        	<?php if(isset($error)): echo '<i class="fa fa-times"></i>'.$error['error']; ?>
	                        	<?php elseif(isset($imagesuccess)) : echo '<i class="fa fa-check"></i>'.$imagesuccess; ?>
	                        	<?php endif;?>
	                        </div>
	                        <div class="form-group">
	                                <button type="submit" name="post" class="btn btn-primary" value="addPhotos">Add Photos</button>
	                        </div>
                            </fieldset>
                          
                        </form>


						<div class="grid-portfolio tj-lightbox-gallery same-ratio-items">
                            
                            
                    		<?php foreach($photos as $photo) : ?>
								<!-- Gallery Item -->		
								<div class="gp-item tj-hover-5">
									<a href="<?php echo site_url('uploads/'.$gallery->photographer_id.'/'.$gallery->gallery_id.'/'.$photo->file_name);?>"  class="lightbox-gallery-item">
										<img src="<?php echo site_url('uploads/'.$gallery->photographer_id.'/'.$gallery->gallery_id.'/'.$photo->file_name);?>" alt="">
										<!-- Item Overlay -->	
										<div class="tj-overlay"></div>
										<!-- /Item Overlay -->	
									</a>
								</div>
                    
		                    <?php endforeach;?>
							</div>



                    </div>
				</div>
<script>
	var input = document.getElementById('filesToUpload');
	var list = document.getElementById('fileList');
	
	//empty list for now...
	while (list.hasChildNodes()) {
		list.removeChild(ul.firstChild);
	}
	
	//for every file...
	for (var x = 0; x < input.files.length; x++) {
		//add to list
		var li = document.createElement('li');
		li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
		list.append(li);
	}
</script>