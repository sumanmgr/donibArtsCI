        <div class="page-main"><!-- page title -->
          <div class="container-fluid">
          <h2>Create New Gallery</h2>
		                 <form class=" form-horizontal" method="post" action="">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Name</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="galleryName" id="inputEmail3" placeholder="Gallery Name" value="<?php if(isset($booking)) echo $booking->booking_title ?>">
                                  <?php if(isset($booking)): ?>
                                  <input type="hidden" name="galleryBooking" value="<?php echo $booking->booking_id ?>" />
                                  <input type="hidden" name="galleryType" value="1" />
                                  <?php endif; ?>
                                </div>
                              </div>
                              <?php if(isset($booking)): ?>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Gallery Description</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="galleryDescription" id="inputPassword3" placeholder="Gallery Description"></textarea>
                                </div>
                              </div>
                              <?php endif; ?>
                              <?php /*
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="galleryType">
                                        <option value="0">Portfolio</option>
                                        <option value="1">Customer Gallery</option>
                                    </select>
                                </div>
                              </div>
                              */ ?>
                              <!-- this section will open after the phhotographer selects customer gallery 
                              -->
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Booking Detail</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" rows=4 readonly>Booking Title : <?php echo $booking->booking_title; ?> 
Booking By : <?php echo $booking->fullname; ?> 
Booking Description : <?php echo $booking->booking_details; ?> 
Event Date: <?php echo $booking->book_start_date_time?> - <?php echo $booking->book_end_date_time?>
</textarea>
                                </div>
                              </div>
                              

                              <div class="form-group">
                            <button type="submit" name="gallery" class="btn btn-primary float-right" value="newGallery"> Create Gallery</button>
                            </div>
                    </form>
                    </div>
                    </div>
