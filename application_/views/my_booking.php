        <div class="page-main"><!-- page title -->
          <div class="container-fluid">
          <h2>My Booking</h2>
		          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <?php	  
					  $booking_status_values = array("Booking Pending", "Booking Confirmed", "Cancelled By Customer", "Rejected By Photographer");
					  foreach($bookings as $booking):?>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="booking_<?php echo $booking->booking_id; ?>">
                          <div class="head">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $booking->booking_id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $booking->booking_id; ?>">
                              <?php echo $booking->booking_title; ?>
                              <?php if($booking->booking_status == 0) : ?>
                              <a href="<?php echo site_url()?>account/cancel-booking/<?php echo $booking->booking_id?>" class="btn btn-primary pull-right"><?php echo $user->user_type ==  'c' ? "Cancel" : "Reject"?> Booking</a>
                              <?php if($user->user_type ==  'p') : ?><a href="<?php echo site_url()?>account/accept-booking/<?php echo $booking->booking_id?>" class="btn btn-primary pull-right">Accept Booking</a>
                              <?php endif?>
                              <?php endif; ?>
                            </a>
                          </div>
                        </div>
                        <div id="collapse_<?php echo $booking->booking_id; ?>" class="panel-collapse collapse body" role="tabpanel" aria-labelledby="booking_<?php echo $booking->booking_id; ?>">
                          <div class="panel-body">
                          
                              <p><b>Booked on : </b><?php echo $booking->booking_date_time; ?></p>
                              <p><b>Booked For : </b><?php echo $booking->book_start_date_time; ?> - <?php echo $booking->book_end_date_time; ?></p>
                              <p><b><?php echo $user->user_type ==  'c' ? "Photographer " : "Customer "?> : </b><?php echo $booking->fullname?></p>
                              
                              <p><b>Booking Status : </b><?php echo $booking_status_values[$booking->booking_status] ?></p>
                              <p><b>Description : </b><?php echo $booking->booking_details; ?></p>
                              <p><b>Gallery Accessy Type : </b><?php echo ($booking->gallery_access_type) == 0  ? "Private" : "Public"; ?></p>
                              <?php if($user->user_type ==  'p' && $booking->booking_status == 1) : ?>
                              <?php if( $booking->gallery_id == 0) :?>
                              <a href="<?php echo site_url('account/create-gallery/'.$booking->booking_id); ?>" class="btn btn-primary">Create Gallery</a>
                              <?php else : ?>
                              
                              <a href="<?php echo site_url('account/edit-gallery/'.$booking->gallery_id); ?>" class="btn btn-primary">Add Photos</a>
                              <?php endif; ?>
                              <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>       
                                             
                                             
                    </div>
                    </div>