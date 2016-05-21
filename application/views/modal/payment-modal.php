
            <div class="modal fade payment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog">
                    <form class="modal-content form-horizontal" method="post" action="<?php echo site_url("booking/make-payment")?>">
                        <div class="modal-header"></div>
                        <div class="modal-body">
	                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Payment mode</label>
                                <div class="col-sm-8">
                                  <input type="hidden" name="booking_id" id="form-booking-id"  value="0" />
                                  <input type="text" readonly class="form-control" name="payment_mode" placeholder="Full Name" value="Paypal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Amount</label>
                                <div class="col-sm-8">
                                  <input type="text" readonly class="form-control" name="amount" id="form-booking-quote" placeholder="Full Name" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                           	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          	<button type="submit" class="btn btn-primary" name="update" value="post">Pay Now</button>
                        </div>
                    </form>
              </div>
            </div>