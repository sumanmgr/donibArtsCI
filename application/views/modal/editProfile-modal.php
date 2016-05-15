
            <div class="modal fade editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" method="post" action="<?php echo site_url("home")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="full_name" id="inputEmail3" placeholder="Full Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Mobile</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputEmail3" name="mobile" placeholder="Mobile Number">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label" name="address">Address</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="last_name" id="inputPassword3" placeholder="Address">
                                </div>
                              </div>
								<?php if($user->user_type=='c') : ?>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label" name="user_type">Refrence</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="refrence">
                                        <option value="n">Newspaper</option>
                                        <option value="f">Friend</option>
                                        <option value="fa">Facebook</option>
                                        <option value="g">Google</option>
                                        <option value="o">Other</option>
                                    </select>
                                </div>
                              </div>
                              <?php endif;?>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label" name="facebook">Facebook</label>
                                <div class="col-sm-8">
                                  <input type="text" name="facebook" class="form-control" id="inputPassword3" placeholder="Facebook">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Instagram</label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="instagram" id="inputPassword3" placeholder="Instagram">
                                </div>
                              </div>
								<?php if($user->user_type=='p') : ?>
                               <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Experties</label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="experties" id="inputPassword3" placeholder="Experties">
                                </div>
                                <?php endif;?>
                              </div>
                               <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update" value="post">Update</button>
                        </div>
                    </form>
              </div>
            </div>