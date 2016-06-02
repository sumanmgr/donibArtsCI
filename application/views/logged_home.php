
<?php
if ($this->session->has_userdata('user')) {
    $menuUser = $this->session->userdata['user'];
}

$reference_values = array(
    'f' => 'friend',
    'n' => 'newspaper',
    'fa' => 'facebook',
    'g' => 'google',
    'o' => 'other'
);
?>


<!-- Main Contents -->
<div class="page-main ajax-element scroll-destination"><!-- page title -->
    <div class="çontainer no-row-margin">
        <h2 class="section-title double-title">
            <span></span><?php echo $user->fullname?>
        </h2>
        <!--/ page title -->


        <div class="row mb-large">
            <div class="col-md-8">
<?php if ($user->user_type == 'p') : ?>						
                    <!-- masterslider -->
                    <div class="tj-ms-slider ms-skin-toranj" data-autoheight="true" id="masterslider">

                        <?php if (count($slides) > 0) :
                            foreach ($slides as $photo) :
                                ?>
                                <div class="ms-slide">
                                    <img src="../assets/masterslider/blank.gif" data-src="<?php echo site_url('uploads/' . $user->user_id . '/' . $portfolio . '/' . $photo->file_name); ?>" alt="lorem ipsum dolor sit"/>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <!-- end of masterslider -->
<?php endif; ?>
            </div>

            <div class="col-md-4">
                <h3 class="bordered">
                    Profile Details

<?php if (isset($menuUser) && $menuUser->user_id == $user->user_id) : ?>
                        <a href="#" class="" data-toggle="modal" data-target=".editProfileModal" ><i class="fa fa-edit"></i> Edit</a>
<?php endif; ?>
                </h3>
                <ul class="list-items">
                    <li>
                        <div class="list-label">Full Name</div>
                        <div class="list-des"><?php echo $user->fullname ?></div>
                    </li>
                    <li>
                        <div class="list-label">Address</div>
                        <div class="list-des"><?php echo $user->address ?></div>
                    </li>
                    <li>
                        <div class="list-label">Mobile</div>
                        <div class="list-des"><?php echo $user->mobile ?></div>
                    </li>
                    <li>
                        <div class="list-label">Email</div>
                        <div class="list-des"><?php echo $user->email ?></div>
                    </li>
                    <li>
                        <div class="list-label">Username</div>
                        <div class="list-des"><?php echo $user->username ?></div>
                    </li>
<?php if ($user->user_type == 'p') : ?>
                        <li>
                            <div class="list-label">Experties</div><!-- from photographer table -->
                            <div class="list-des"><?php echo $otherdata->experties ?></div>
                        </li>
                        <li>
                            <div class="list-label">Per Hour</div><!-- from photographer table -->
                            <div class="list-des"><?php echo $otherdata->perHourRate ?></div>
                        </li>
<?php endif; ?>

<?php if ($user->user_type == 'c') : ?>
                        <li>
                            <div class="list-label">Reward Point</div><!-- from customer table -->
                            <div class="list-des"><?php echo $rewardData->reward_point ?></div>
                        </li>
                        <li>
                            <div class="list-label">Refrence</div><!-- from customer table -->
                            <div class="list-des">
                                <?php
                                if (isset($reference_values[$rewardData->refrence])) {
                                    echo $reference_values[$rewardData->refrence];
                                }
                                ?>
                            </div>
                            <!--* no valid index for $rewardData->reference??/-->
                        </li>
<?php endif; ?>
                </ul>
            </div>

        </div>

        <div class="row mb-large">
            <div class="col-md-12">
                <h3 class="bordered">Description</h3>
                <p>This is a simple pharagraph tag. The Love Boat soon will be making another run. The Love Boat promises something for everyone. Makin their way the only way they know how. That's just a little bit more than the law will allow. It's time to put on makeup. It's time to dress up right. It's time to raise the curtain on the Muppet Show tonight. Movin' on up to the east side. We finally got a piece of the pie. This is a simple pharagraph tag. The Love Boat soon will be making another run. The Love Boat promises something for everyone. Makin their way the only way they know how. That's just a little bit more than the law will allow. It's time to put on makeup. It's time to dress up right. It's time to raise the curtain on the Muppet Show tonight. Movin' on up to the east side. We finally got a piece of the pie. </p>
            </div>
        </div>

        <!-- related works -->
<?php if ($user->user_type == 'p') : ?>
            <hr/>
            <div class="widget">
                <div class="widget-title">
                    <h4 class="bordered">Related Works</h4>
                </div>
                <div class="row">
    <?php
    $count = 0;

    foreach ($galleries as $gallery) :
        ?>

                        <div class="col-md-4">
                            <div class="tj-hover-1">
                                <a href="<?php echo site_url('account/view-gallery/' . $gallery->gallery_id); ?>" class="ajax-portfolio normal">
                                    <!-- Item Overlay -->	
        <?php if ($gallery->photo) : ?>
                                        <img src="<?php echo site_url('uploads/' . $gallery->photographer_id . '/' . $gallery->gallery_id . '/' . $gallery->photo->file_name); ?>"  alt="<?php echo $gallery->gallery_name ?>" class="img-responsive">
        <?php endif; ?>


                                    <div class="tj-overlay">
                                        <h3 class="title"><?php echo $gallery->gallery_name ?></h3>
                                        <h4 class="subtitle"><?php echo $gallery->gallery_description ?></h4>
                                    </div>
                                    <!-- /Item Overlay -->	
                                </a>
                            </div>
                        </div>


        <?php endforeach; ?>

                    <!--test -->

                </div>
            </div>
<?php endif; ?>
        <!-- /related works -->

        <hr/>
        <a class="back-to-top" href="#"></a>

    </div></div>
<!-- /Main Contents -->

<!--Ajax folio-->
<div id="ajax-folio-loader">
    <!-- loading css3 -->
    <div id="followingBallsG">
        <div id="followingBallsG_1" class="followingBallsG">
        </div>
        <div id="followingBallsG_2" class="followingBallsG">
        </div>
        <div id="followingBallsG_3" class="followingBallsG">
        </div>
        <div id="followingBallsG_4" class="followingBallsG">
        </div>
    </div>
</div>
<div id="ajax-folio-item"></div>
<!--Ajax folio-->
