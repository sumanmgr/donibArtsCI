

        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Flat Admin V2</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <form method="post" action="<?php echo site_url('admin/login') ?>">
                                <div class="control">
                                    <input type="text" name="adminLogin" class="form-control"  placeholder="login" />
                                </div>
                                <div class="control">
                                    <input type="password" name="adminPass" class="form-control" placeholder="password" />
                                </div>
                                <div class="login-button text-center">
                                    <input name="userlogin" type="submit" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>
                        <div class="login-footer">
                            <span class="text-right"><a href="#" class="color-white">Forgot password?</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
