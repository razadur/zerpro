<?php include('header.php');?>

<style>
    .btn.btn-info {
        background: #eee none repeat scroll 0 0;
        border: 1px solid #ccc;
        color: #08789A;
        font-size: 12px;
        font-weight: bold;
        text-decoration:underline;
    }
    .btn.btn-info ul{
        list-style:none;
    }
    .btn.btn-info li{
        float:left;
        width:25%;
    }
</style>
<section class="main-containt">
    <div class="container">
        <div class="row">
<!--            --><?php //include('left_menu.php');?>
            <aside class="col-md-3 col-sm-3">
                <?php if($this->session->userdata('user_type') == 'Employeer'){ ?>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel/create_job">Create Job</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list">Joblist</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/shortlist">Shortlist</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle  active" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                <?php } ?>
                <?php if($this->session->userdata('userid')){ ?>
                    <?php
                    if($this->session->userdata('user_type') == 'Frelancer'){ ?>
                        <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
                        <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                        <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
                        <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                        <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/awaitingAcceptance">Awaiting Acceptance</a>
                    <?php } ?>

                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
                <?php } ?>
            </aside>
            <main class="col-md-9 col-sm-9">
                <div class="candidate_panel">
                    <h2>Notification</h2>

                    <div class="applicants">
<!--                        <pre>-->
<!--                        --><?php //print_r($feedback_job_ids);?>
                        <?php foreach($feedback_job_ids as $feedback_job_id){ ?>
                            <div class="media-body">
                                <div class="col-md-9">
                                    <h3><?php echo $feedback_job_id->job_title;?></h3>
                                    <dl class="row">
                                        <dt class="col-sm-5">Employer:</dt>
                                        <dd class="col-sm-7"><strong><?php echo $feedback_job_id->employer; ?></strong></dd>
                                        <dt class="col-sm-5">Employer Feedback:</dt>
                                        <dd class="col-sm-7"><?php $fBk =  $feedback_job_id->emp_free; ?>
                                            <div>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=1 ? '' : '-o';?>"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=2 ? '' : '-o';?>"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=3 ? '' : '-o';?>"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=4 ? '' : '-o';?>"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=5 ? '' : '-o';?>"></i>
                                            </div>
                                        </dd>
                                        <dt class="col-sm-5">Employer Comment:</dt>
                                        <dd class="col-sm-7"><?php echo $feedback_job_id->emp_free_msg; ?></dd>
                                    </dl>
                                </div>
                                <div class="col-md-3">
                                    <div style="padding-top: 50px">
                                    <a class="btn btn-primary btn-block" href="<?php echo base_url().'index.php/job_list/jobFeedback';?>">Feedback</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                </div>
                <br/>
            </main>

        </div>
    </div>
</section><!-- /.main-containt -->
<?php include('footer.php');?>

<script>
    $(document).ready(function(){
        $('.voted').hover(
            function() {
                $('.voted').addClass('hide');
                $('.votable').removeClass('hide');
            }
        );

        $('.votable').on('mouseleave',function(){
            $('.voted').removeClass('hide');
            $('.votable').addClass('hide');
        });

        $('.votable > i').hover(
            function() {
                $(this).prevAll().andSelf().removeClass('fa-star-o').addClass('fa-star');
                $(this).nextAll().removeClass('fa-star').addClass('fa-star-o');
            },
            function() {
                $(this).prevAll().andSelf().removeClass('fa-star').addClass('fa-star-o');
            }
        );

        $('.votable > i').click(function(e) {
            var vote_type = $(this).attr('data-vote-type');
            var el = $('.voted > i[data-vote-type="' + vote_type + '"]');

            $(el).prevAll().andSelf().removeClass('fa-star-o').addClass('fa-star');
            $(el).nextAll().removeClass('fa-star').addClass('fa-star-o');
            $('#ratedValue').val(vote_type);
        });
    });


    $(window).load(function(){
        $('.voted').hover(
            function() {
                $('.voted').addClass('hide');
                $('.votable').removeClass('hide');
            }
        );

        $('.votable').on('mouseleave',function(){
            $('.voted').removeClass('hide');
            $('.votable').addClass('hide');
        });

        $('.votable > i').hover(
            function() {
                $(this).prevAll().andSelf().removeClass('fa-star-o').addClass('fa-star');
                $(this).nextAll().removeClass('fa-star').addClass('fa-star-o');
            },
            function() {
                $(this).prevAll().andSelf().removeClass('fa-star').addClass('fa-star-o');
            }
        );

        $('.votable > i').click(function(e) {
            var vote_type = $(this).attr('data-vote-type');
            var el = $('.voted > i[data-vote-type="' + vote_type + '"]');

            $(el).prevAll().andSelf().removeClass('fa-star-o').addClass('fa-star');
            $(el).nextAll().removeClass('fa-star').addClass('fa-star-o');
        });
    });
</script>