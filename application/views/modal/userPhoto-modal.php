            <div class="modal fade addPhoto-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url("account/updatePicture")?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Profile Picture</h4>
                        </div>
                        <div class="modal-body">
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="file" class="form-control" name="profilePic" id="pp" placeholder="Choose A Photo">
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name ="post" value="addPhoto" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
              </div>
            </div>
