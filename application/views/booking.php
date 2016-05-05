        <div class="page-main"><!-- page title -->
          <div class="container-fluid">
          <h2>Book Photographer</h2>
		                 <form class=" form-horizontal" method="post" action="<?php echo site_url("registration")?>">
                             <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Photographer</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="photographer">
                                        <option value="QUERY 0">QUERY 1</option>
<!-- QUERY 0: Select user_id from user where user_type=0;
QUERY 1: Select full_name from user where user_type=0  -->                                        
                                    </select>
                                </div>
                              </div>  <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Date &nbsp; Time</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="dateTime" id="inputPassword3" placeholder="Place a date and time picker" />
                                </div>
                              </div>
                               <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Booking Description</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="bookingDescription" id="inputPassword3" placeholder="Booking Description"></textarea>
                                </div>
                              </div>
                             
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Access</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="gallery_access">
                                        <option value="0">Private</option>
                                        <option value="1">Public</option>
                                    </select>
                                </div>
                              </div>
                              
                              

                              <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Create Gllery</button>
                            </div>
                    </form>
                    </div>
                    </div>
