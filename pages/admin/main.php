<?php
$usr = countable('login');
$alumni = countable('data_alumni');
$post = countable('post');
$comment = countable('comment');
?>
<div class="courses-area mg-b-15" style="margin-top:70px;">
    <div class="container-fluid">
        <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu">
                            <i class="fas fa-user"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo  $usr ?> User</h3>
                                <p>User</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                            <i class="fas fa-user-graduate"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo $alumni ?> Orang</h3>
                                <p>Alumni</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fas fa-mail-bulk"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo $post ?> Post</h3>
                                <p>Post</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fas fa-comments"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo $comment ?> Comments</h3>
                                <p>Comment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>