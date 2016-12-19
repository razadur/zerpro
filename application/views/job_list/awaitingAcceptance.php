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
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/job_list/awaitingAcceptance">Awaiting Acceptance</a>
                <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
            </aside>
            <main class="col-md-9 col-sm-9">
                <div class="candidate_panel">
                    <h2>Awaiting Acceptance  Jobs</h2>
                    <div class="applicants">
                        <?php foreach($awaitingAcceptanceJob as $job){
                            ?>
                            <div class="media-body">
                                <div class="col-md-9">
                                    <h3><?php echo $job->job_title; ?></h3>
                                    <p><?php echo $job->job_description; ?></p>
                                    <dl class="row">
                                        <dt class="col-sm-5">Budget:</dt>
                                        <dd class="col-sm-7"><?php echo $job->budget; ?></dd>
                                        <dt class="col-sm-5">Experience:</dt>
                                        <dd class="col-sm-7"><?php echo $job->experience; ?></dd>
                                        <dt class="col-sm-5">Qualification:</dt>
                                        <dd class="col-sm-7"><?php echo $job->qualification; ?></dd>
                                        <dt class="col-sm-5">Employee:</dt>
                                        <dd class="col-sm-7"><?php echo $job->name; ?></dd>
                                        <!--<dt class="col-sm-5">Awarding Date:</dt>
                                        <dd class="col-sm-7"><?php /*echo $job->awarding_date; */?></dd>-->
                                    </dl>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $job->job_applications_id ?>" style="margin-top:5px">Accept Job</button>
                                    <button id="rejectJob" class="btn btn-block btn-primary" onclick="acceptance(<?php echo $job->job_applications_id ?>,0)">Reject Job</button>
                                </div>
                            </div>
                        <?php } ?>

                    </div>





                    <div class="modal fade" id="myModal_<?php echo $job->job_applications_id ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $userId = $this->session->userdata('userid');
                                    $this->load->model('admin_panel_model');
                                    $package_info = $this->admin_panel_model->packageInfo($userId);
//                                    print_r($package_info);
                                    if($package_info[0]->job_geting_package == 1){?>
                                        Per Job Payment.
                                        <form name="frm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                            <div style="">
                                                <input type="hidden" name="cmd" value="_xclick" />
                                                <input type="hidden" name="business" value="patrickmotors-facilitator@yahoo.com" />
                                                <input type="hidden" name="amount" value="1" />
                                                <input type="hidden" name="no_shipping" value="1" />
                                                <input type="hidden" name="no_note" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="lc" value="USD" />
                                                <input type="hidden" name="item_name" value="Registration" />
                                                <input type="hidden" name="bn" value="PP-BuyNowBF" />
                                                <input type="hidden" name="return" value="<?php echo base_url();?>index.php/Job_list/perJobPay/<?php echo $job->job_applications_id ?>/1">
                                                <input type="hidden" name="rm" value="2" />
                                                <input type="submit"  border="0" name="submit" value="Accept Job" alt="Make payments with PayPal - it's fast, free and secure!" class="btn btn-block btn-primary" title="Make payments with PayPal - it's fast, free and secure!" />
                                                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                                            </div>
                                        </form>
                                    <?php }elseif(strtotime($package_info[0]->start_date)<= strtotime(date('Y-m-d')) &&
                                        strtotime($package_info[0]->end_date)>= strtotime(date('Y-m-d'))){?>
                                        <button id="acceptJob" class="btn btn-block btn-primary" onclick="acceptance(<?php echo $job->job_applications_id ?>,1)">Accept Job</button>
                                    <?php }else{?>
                                        Your Package is expired. Press Accept Job button for renewing package and accepting the job.
                                        <form name="frm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                            <div style="">
                                                <input type="hidden" name="cmd" value="_xclick" />
                                                <input type="hidden" name="business" value="patrickmotors-facilitator@yahoo.com" />
                                                <input type="hidden" name="amount" value="10" />
                                                <input type="hidden" name="no_shipping" value="1" />
                                                <input type="hidden" name="no_note" value="1" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="lc" value="USD" />
                                                <input type="hidden" name="item_name" value="Registration" />
                                                <input type="hidden" name="bn" value="PP-BuyNowBF" />
                                                <input type="hidden" name="return" value="<?php echo base_url();?>index.php/Job_list/perJobPay/<?php echo $job->job_applications_id ?>/10/1">
                                                <input type="hidden" name="rm" value="2" />
                                                <input type="submit"  border="0" name="submit" value="Accept Job" alt="Make payments with PayPal - it's fast, free and secure!" class="btn btn-block btn-primary" title="Make payments with PayPal - it's fast, free and secure!" />
                                                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <br/>
            </main>

        </div>
    </div>
</section><!-- /.main-containt -->
<?php include('footer.php');?>


<script>
    function acceptance(jobId,acceptance_token){
        if(confirm('Are you sure?')){
            var data = 'id='+jobId+'&acceptance_token='+acceptance_token;
            alert(data);
            /*$.ajax({
                url:'<?php echo base_url();?>index.php/Job_list/awaitingAcceptance',
                data: data,
                type:'POST',
                success:function(data){
                    location.href = "<?php echo base_url();?>index.php/Job_list/awaitingAcceptance"
                }
            });*/
        }
    }
</script>