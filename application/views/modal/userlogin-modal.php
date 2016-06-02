
            <div class="modal fade register-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" id="regForm" method="post" action="<?php echo site_url("registration")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">User Registeration</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputEmail3" required="required" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="first_name" id="reg_first_name" placeholder="Firstname">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" required="required" class="col-sm-4 control-label" name="last_name">Lastname</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="last_name" id="reg_last_name" placeholder="Lastname">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" required="required" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" id="reg_email" name="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" required="required" class="col-sm-4 control-label" name="user_type">Register as</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="user_type" id="reg_user_type">
                                        <option value="c">Customer</option>
                                        <option value="p">Photographer</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" required="required" class="col-sm-4 control-label" name="username">Username</label>
                                <div class="col-sm-8">
                                  <input type="text" name="username" class="form-control" id="reg_username" placeholder="Username"> <span id="userAvailability"></span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                        <input type="password" required="required" class="form-control" name="password" id="reg_password" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Retype Password</label>
                                <div class="col-sm-8">
                                        <input type="password" required="required" class="form-control" name="password_confirm" id="reg_password_confirm" placeholder="Retype Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">&nbsp;</label>
                                <span id="regInfo"></span>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="registrationButton" class="btn btn-primary">Register</button>
                        </div>
                    </form>
              </div>
            </div>

            <div class="modal fade login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" id="loginForm" method="post" action="<?php echo site_url("login")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Login</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">
                                  <input required="required" type="username" class="form-control" name="username" id="usernameInput" placeholder="Username">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input required="required" type="password" class="form-control" name="password" id="passwordInput" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">&nbsp;</label>
                                <span id="loginInfo"></span>
                              </div>
                        <div class="modal-footer">
                            <button type="submit" name ="userLogin"class="btn btn-primary">Login</button>
                        </div>
                    </form>
              </div>
            </div>


<script type="text/javascript">
  
      <?php if(! ($this->session->has_userdata('user') ) ) : ?>
        $('#loginForm').submit( function(e){
          e.preventDefault();
          $.post( 
            "<?php echo site_url("users/login/"); ?>",
            {
              'username': $('#usernameInput').val(), 
              'password': $('#passwordInput').val() 
            },
            function( data ) {
              if(data == 'logged'){
                location.reload();
              }
              else{
                $('#loginInfo').html('<i class="fa fa-times"></i> ' +data);
              }
            }
          );
        });
        $('#regForm').submit(function(e){
          e.preventDefault();
          $.post( 
            "<?php echo site_url("registration"); ?>",
            {
              'first_name': $('#reg_last_name').val(),
              'last_name':  $('#reg_last_name').val(),
              'email':      $('#reg_email').val(),
              'user_type':  $('#reg_user_type').val(),
              'username':   $('#reg_username').val(),
              'password':   $('#reg_password').val(),
              'password_confirm': $('#reg_password_confirm').val() 
            },
            function( data ) {
              if(data == 'registered'){
                window.location.href = "<?php echo site_url("registration/success")?>";
              }
              else{
                $('#regInfo').html('<i class="fa fa-times"></i> ' +data);
              }
            }
          );
        });
      <?php endif; ?>
</script>
