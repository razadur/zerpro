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
            <?php include('left_menu.php');?>
            <main class="col-md-9 col-sm-9">
                <div class="candidate_panel">
                    <h2>Feedback</h2>

                    <div class="applicants">
<!--                        <pre>-->
<!--                        --><?php //print_r($feedback_job_ids);?>
                        <?php foreach($feedback_job_ids as $feedback_job_id){ ?>
                            <div class="media-body">
                                <div class="col-md-9">
                                    <h3><?php echo $feedback_job_id->job_title;?></h3>
                                    <form action="<?php echo base_url();?>index.php/job_list/feedbackSendEmp" method="POST">
                                    <dl class="row">
                                        <dt class="col-sm-5">Freelancer:</dt>
                                        <dd class="col-sm-7"><?php echo $feedback_job_id->freelancer; ?></dd>
                                        <dt class="col-sm-5">Feedback:</dt>
                                        <dd class="col-sm-7">
                                            <div class="votable hide" style="cursor: pointer">
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="1"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="2"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="3"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="4"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="5"></i>
                                            </div>
                                            <div class="voted" style="cursor: pointer">
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="1"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="2"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="3"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="4"></i>
                                                <i style="cursor: pointer" class="fa fa-2x fa-star-o" data-vote-type="5"></i>
                                            </div>
                                            <input type="hidden" id="ratedValue" name="ratedValue">
                                            <input type="hidden" name="jobId" value="<?php echo $feedback_job_id->job_id?>">
                                        </dd>
                                        <dt class="col-sm-5">Comment:</dt>
                                        <dd class="col-sm-7"><textarea rows="5" cols="40" id="rateComment" name="rateComment" placeholder="Please comment here...."></textarea></dd>
                                    </dl>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-3">
                                            <input class="btn btn-primary btn-block" type="submit" value="Save" name="submit" /><br>
                                        </div>
                                    </form>
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