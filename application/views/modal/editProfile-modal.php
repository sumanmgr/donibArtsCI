
            <div class="modal fade editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" id="userInfoForm" method="post" action="<?php echo site_url("home")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                                <div class="col-sm-8">
                                  <input type="text" required="required" class="form-control" name="full_name" id="inputEmail3" placeholder="Full Name" value="<?php echo $user->fullname?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" required="required" class="form-control" id="inputEmail3" name="email" placeholder="Email"  value="<?php echo $user->email; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Mobile</label>
                                <div class="col-sm-8">
                                  <input type="text" required="required" class="form-control" id="inputEmail3" name="mobile" placeholder="Mobile Number"  value="<?php echo $user->mobile?>">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputPassword3" required="required" class="col-sm-4 control-label" name="address">Address</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="address" id="inputPassword3" placeholder="Address"  value="<?php echo $user->address; ?>">
                                </div>
                              </div>
								<?php if($user->user_type=='c') : ?>
                              <div class="form-group">
                                <label for="inputEmail3" required="required" class="col-sm-4 control-label" name="user_type">Refrence</label>
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
                                  <input type="text" name="facebook" class="form-control" id="inputPassword3" placeholder="Facebook"  value="<?php echo $user->facebook; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Instagram</label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="instagram" id="inputPassword3" placeholder="Instagram"  value="<?php echo $user->instagram; ?>">
                                </div>
                              </div>
								<?php if($user->user_type=='p') : ?>
                               <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Experties</label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="experties" id="inputPassword3" placeholder="Experties" value="<?php echo $otherdata->experties; ?>">
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Hourly Rate</label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="perHourRate" id="inputPassword3" placeholder="Hourly Rate" value="<?php echo $otherdata->perHourRate; ?>">
                                </div></div>
                                <?php endif;?>
                                <div class="form-group">
                                  <span id="profileFormInfo"></span>
                                </div>
                              </div>
                               <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update" value="post">Update</button>
                        </div>
                    </form>
              </div>
            </div>

<div class="modal fade form-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        Success  
      </div>
      <div class="modal-body">
      <i class="fa fa-check"></i> Your details have been updated.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            <script type="text/javascript">
              $('#userInfoForm').submit(function (e) {

                form = $(this);
                e.preventDefault();
                $.post(
                  "<?php echo site_url("home/profileUpdate"); ?>",
                    form.serialize()
                    ,
                  function(data){
                    if(data == "success"){
                      $('.editProfileModal').modal('hide');
                      $('.form-update').modal('show');

                    }
                    else{
                      $('#profileFormInfo').html('<i class="fa fa-times"></i> ' +data);
                    }
                  }
                )
              })
            </script>