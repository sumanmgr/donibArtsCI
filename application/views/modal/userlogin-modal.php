
            <div class="modal fade register-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" method="post" action="<?php echo site_url("registration")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">User Registeration</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="first_name" id="inputEmail3" placeholder="Firstname">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label" name="last_name">Lastname</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="last_name" id="inputPassword3" placeholder="Lastname">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label" name="user_type">Register as</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="user_type">
                                        <option value="c">Customer</option>
                                        <option value="p">Photographer</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label" name="username">Username</label>
                                <div class="col-sm-8">
                                  <input type="text" name="username" class="form-control" id="inputPassword3" placeholder="Username">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Retype Password</label>
                                <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password_confirm" id="inputPassword3" placeholder="Retype Password">
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
              </div>
            </div>

            <div class="modal fade login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" method="post" action="<?php echo site_url("login")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Login</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">
                                  <input type="username" class="form-control" name="username" id="inputUsername" placeholder="Username">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name ="userLogin"class="btn btn-primary">Login</button>
                        </div>
                    </form>
              </div>
            </div>
