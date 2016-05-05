<?php
    $this->load->view('admin/shared/htmlHead');
    $this->load->view('admin/shared/navbar');
    $this->load->view('admin/shared/sidemenu');
?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <!--div class="page-title">
                        <span class="title">Table</span>
                        <div class="description">A bootstrap table for display list of data.</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Table</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="sub-title">Table Striped <span class="description">( .table-striped )</span></div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="sub-title">Table Bordered <span class="description">( .table-bordered )</span></div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="sub-title">Table Hover <span class="description">( .table-hover )</span></div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="sub-title">Table Condensed <span class="description">( .table-condensed )</span></div>
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="sub-title">Contextual classes <span class="description">( .active , .success , .info , .warning , .danger )</span></div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Column heading</th>
                                                        <th>Column heading</th>
                                                        <th>Column heading</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="active">
                                                        <th scope="row">1</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr class="success">
                                                        <th scope="row">3</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <th scope="row">5</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr class="warning">
                                                        <th scope="row">7</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">8</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                    <tr class="danger">
                                                        <th scope="row">9</th>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                        <td>Column content</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div!-->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                    <div class="title">Users</div>
                                    </div>

                                    <div class="float-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".new-modal-modal-lg">Add user</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="panel panel-default">
                                        <!-- Default panel contents -->
                                        <div class="panel-heading">All Users
                                        </div>
                                        <!-- Table -->
                                        <?php 
                                            if (count($allUsers) > 1) : 
                                            $userCount = 0;
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($allUsers as $user) : 
                                                    $userCount++;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $userCount; ?></th>
                                                    <td><?php echo $user->username; ?></td>
                                                    <td><?php echo $user->pass; ?></td>
                                                    <td><?php echo $user->username; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?php else: ?>

                                        <div class="panel-body">
                                            <p>No Users</p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade new-modal-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg">
                    <form class="modal-content form-horizontal" method="post" action="<?php echo site_url("admin/users")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add new user</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">User type</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option value="a">Admin</option>
                                        <option value="p">Photographer</option>
                                        <option value="c">Customer</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-6">
                                        <input type="readonly" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary form-control no-margin-top">Generate</button>
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </form>
              </div>
            </div>

<?php   $this->load->view('admin/shared/htmlFoot');
?>