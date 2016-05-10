        <div class="page-main"><!-- page title -->
          <div class="container-fluid">
          <h2>Create New Gallery</h2>
		                 <form class=" form-horizontal" method="post" action="">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Name</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="galleryName" id="inputEmail3" placeholder="Gallery Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Gallery Description</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="galleryDescription" id="inputPassword3" placeholder="Gallery Description"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Gallery Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="galleryType">
                                        <option value="0">Portfolio</option>
                                        <option value="1">Customer Gallery</option>
                                    </select>
                                </div>
                              </div>
                              
                              <!-- this section will open after the phhotographer selects customer gallery 
                              -->
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Booking</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="galleryBooking">
                                        <option value="0">Select From List</option>
                                         <option value="0">QUERY 1 </option>
<!--Select bookingID from Bookings as b, user as u where b.userId = u.userId -->
                                    </select>
                                </div>
                              </div>
                              

                              <div class="form-group">
                            <button type="submit" name="gallery" class="btn btn-primary float-right" value="newGallery"> Create Gallery</button>
                            </div>
                    </form>
                    </div>
                    </div>
