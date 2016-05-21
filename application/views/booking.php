        <div class="page-main"><!-- page title -->
          <div class="container-fluid">
          <h2>Book Photographer</h2>
		                 <form class=" form-horizontal" method="post" action="">
                             <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Photographer</label>
                                <div class="col-sm-6">
                                	<input readonly  class="form-control" name="photographerName" value="<?php echo $photographer->fullname; ?>"/> 
                                    <input type="hidden" name="photographer_id" value="<?php echo $photographer->user_id; ?>" />
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Rate</label>
                                <div class="col-sm-6">
                                	<input readonly  class="form-control" name="perHourRate" value="<?php echo $otherdata->perHourRate; ?>"/> 
                                    <input type="hidden" name="perHourRate" value="<?php echo $otherdata->perHourRate; ?>" />
                                </div>
                              </div>
                               <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Booking Title</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="bookingTitle" id="inputPassword3" placeholder="Booking Title" />
                                </div>
                               </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Date &nbsp; Time</label>
                                <div class="col-sm-6">
                                  <input class="form-control" name="startDateTime" id="datetimepicker" placeholder="Start Date and Time" /> <span> To </span> <input class="form-control" name="endDateTime" id="datetimepicker2" placeholder="End Date and Time" />
                                  <div id="bookingStatus">&nbsp;</div>
                                </div>
                              </div>
                              
                               <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Total Quote</label>
                                <div class="col-sm-6">
                                	<input readonly  class="form-control" name="total_quote" id="total_quote" value="0"/> 
                                    <input type="hidden" name="perHourRate" value="<?php echo $otherdata->perHourRate; ?>" />
                                </div>
                              </div>
                              
                               <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Booking Description</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="bookingDescription" id="inputPassword3" placeholder="Booking Description"></textarea>
                                </div>
                              </div>
                             
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Public Access</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="gallery_access" checked>
                                </div>
                              </div>
                              
                              

                              <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" name="book" value="bookPhotographer">Make Booking</button>
                            </div>
                    </form>
                    </div>
                    </div>
