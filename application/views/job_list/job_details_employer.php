<!--<pre>--><?php //print_r($get_job_details);die;?>
<?php include('header.php');?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $get_job_details->job_title; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="main-containt">
<div class="container">
<div class="row">
<main>
<div class="employer-info">
    <div class="media">
        <div class="media-left">
            <a href="<?php echo base_url()?>index.php/user_panel/emp_publicProfile/<?php echo $get_job_details->user_id; ?>/<?php echo $get_job_details->user_name; ?>">
                <img src="<?php echo base_url(); ?>images/users/<?php echo $employeer_info; ?>" width="180" height="200" />
            </a>
        </div>
        <div class="media-body">
            <div class="job-info">
                <a href="<?php echo base_url()?>index.php/user_panel/emp_publicProfile/<?php echo $get_job_details->user_id; ?>/<?php echo $get_job_details->user_name; ?>">
                    <h2><?php echo $get_job_details->user_name; ?></h2>
                </a>
                <dl>
                    <dt class="col-sm-2">Location:</dt>
                    <dd class="col-sm-9"><?php echo $get_job_details->description; ?></dd>
                    <dt class="col-sm-2">Job posted on:</dt>
                    <dd class="col-sm-9"><?php echo date('m-d-Y',strtotime($get_job_details->entry_date));?></dd>
                    <dt class="col-sm-2">Application:</dt>
                    <dd class="col-sm-9"><?php echo $get_total_applicant; ?></dd>
                    <dt class="col-sm-2">views:</dt>
                    <dd class="col-sm-9"><?php echo $get_job_details->total_view; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div><!-- /.employer-info -->
<div class="job-overview clearfix">
    <div class="col-md-9">
        <div class="job-des">
            <h3>Job overview</h3>
            <p><?php echo $get_job_details->job_description; ?></p>
            <?php if(!empty($get_job_details->attached_file)){?>
                <h3>Addition information</h3>
                <a href="<?php echo base_url()?>images/employeer_file/<?php echo $get_job_details->attached_file; ?>" target="_blank" title="Attachment">
                    <p>Attachment</p>
                </a>
            <?php }?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="job-details">
            <dl class="row">
                <dt class="col-md-5">Posted:</dt>
                <dd class="col-md-7"><?php echo date('m-d-Y',strtotime($get_job_details->entry_date));?></dd>
                <dt class="col-sm-5">Budget:</dt>
                <dd class="col-sm-7"><?php echo $get_job_details->budget; ?></dd>
                <dt class="col-sm-5">Experience:</dt>
                <dd class="col-sm-7"><?php echo $get_job_details->experience; ?></dd>
                <dt class="col-sm-5">Qualification:</dt>
                <dd class="col-sm-7"><?php echo $get_job_details->qualification; ?></dd>
                <dt class="col-sm-5">Vacancy Type:</dt>
                <dd class="col-sm-7"><?php echo $get_job_details->vacancy_type; ?></dd>
                <dt class="col-md-5">Specialization:</dt>
                <dd class="col-md-7"><?php echo str_replace(',',', ',$get_job_details->spcialization);?></dd>
            </dl>

            <?php /*?><form role="form" action="<?php echo base_url();?>job_list/job_details/<?php echo $get_job_details->id; ?>" method="POST"  enctype="multipart/form-data">
									
									<input class="btn btn-primary btn-block" type="submit" value="Shortlist" name="shortlist" />
								</form><?php */?>


            <div class="social-icon">
                <h3>Share:</h3>
                <ul>
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url()?>index.php/job_list/job_details/<?php echo $get_job_details->id; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/share?url=<?php echo base_url()?>index.php/job_list/job_details/<?php echo $get_job_details->id; ?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/share?url=<?php echo base_url()?>index.php/job_list/job_details/<?php echo $get_job_details->id; ?>" target="_blank" ><i class="fa fa-google-plus"></i></a></li>
                    <li><a  href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url()?>index.php/job_list/job_details/<?php echo $get_job_details->id; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- /.job-overview -->
<?php if($get_job_shortlists)
{ ?>

    <div class="applicants">
        <h3>Shortlistes</h3>

        <ul class="applicants-list employer">
            <?php foreach($get_job_shortlists as $get_job_shortlist){ ?>
                <div class="container">
                    <!-- Trigger the modal with a button -->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo $get_job_shortlist->user_id; ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Send Message</h4>
                                </div>
                                <div class="modal-body">
                                    <?php  $get_last_subject_id = $this->admin_panel_model->get_last_subject_id(); ?>
                                    <form role="form" action="<?php echo base_url();?>index.php/job_list/message_send" method="POST"  enctype="multipart/form-data">
                                        <input type="text" name="subject" style="width:100%" placeholder="Subject"/><br/>
                                        <input type="hidden" value="<?php echo $get_last_subject_id+1; ?>" name="subject_id"/>

                                        <textarea name="message" style="width:100%"></textarea>
                                        <input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('userid') ?>" />
                                        <input type="hidden" name="job_id" value="<?php echo $get_job_shortlist->id; ?>" />
                                        <input type="hidden" name="freelancer_id" value="<?php echo $get_job_shortlist->user_id; ?>" />
                                        <input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>

                                        <input class="btn btn-primary btn-block" type="submit" value="Send1" name="submit" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <li>
                    <div class="candidate-pic"><img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_shortlist->user_pic_one; ?>" width="60" height="60" /></div>
                    <div class="candidate-dis">
                        <a href="#" class="candidate-name"><?php echo $get_job_shortlist->name; ?></a>
                        <div class="star">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                        </div>
                    </div>
                    <div class="candidate-details">
                        <p><?php echo $get_job_shortlist->description; ?> <a href="#">Read more</a></p>
                    </div>
                    <div class="candidate-budget">
                        <h5>$<?php echo $get_job_shortlist->expeted_salary; ?>dff</h5>
                    </div>
                    <div class="action-button">
                        <button class="btn btn-block btn-primary">Contact</button>
                    </div>

                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $get_job_applicant->user_id; ?>">Contact</button>
                </li>

            <?php } ?>


        </ul>
    </div>

<?php }else{?>

    <div class="applicants">
        <h3>Applicants</h3>
        <?php if ($this->session->flashdata('flasherror')) { ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
        <?php } ?>
        <ul class="applicants-list employer">
            <?php foreach($get_job_applicants as $get_job_applicant){ ?>

                <div class="container">
                    <!-- Trigger the modal with a button -->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo $get_job_applicant->user_id; ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Send Message</h4>
                                </div>
                                <div class="modal-body">
                                    <?php  $get_last_subject_id = $this->admin_panel_model->get_last_subject_id(); ?>
                                    <form role="form" action="<?php echo base_url();?>index.php/job_list/message_send" method="POST"  enctype="multipart/form-data">
                                        <input type="text" name="subject" style="width:100%" placeholder="Subject"/><br/>
                                        <input type="hidden" value="<?php echo $get_last_subject_id+1; ?>" name="subject_id"/>

                                        <textarea name="message" style="width:100%"></textarea>
                                        <input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('userid') ?>" />
                                        <input type="hidden" name="job_id" value="<?php echo $get_job_details->id; ?>" />
                                        <input type="hidden" name="freelancer_id" value="<?php echo $get_job_applicant->user_id; ?>" />
                                        <input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>

                                        <input class="btn btn-primary btn-block" type="submit" value="Send" name="submit" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php //print_r($get_job_applicant);?>
                <li>
                    <div class="candidate-pic">
                        <a href="<?php echo base_url();?>index.php/withoutLogin_jobList/frelancer_public_profile/<?php echo $get_job_applicant->freelancer_id?>/<?php echo $get_job_applicant->name; ?>">
                        <img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_applicant->user_pic_one; ?>" width="60" height="60" />
                        </a>
                    </div>
                    <div class="candidate-dis">
                        <a href="<?php echo base_url();?>index.php/withoutLogin_jobList/frelancer_public_profile/<?php echo $get_job_applicant->freelancer_id?>/<?php echo $get_job_applicant->name; ?>" class="candidate-name"><?php echo $get_job_applicant->name; ?></a>
                        <?php
                        //print_r($get_job_applicant);
                        $this->load->model('admin_panel_model');
                        $star = $this->admin_panel_model->readStar($get_job_applicant->freelancer_id);
                        $fBk = intval($star[0]->star);?>
                        <div>
                            <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=1 ? '' : '-o';?>"></i>
                            <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=2 ? '' : '-o';?>"></i>
                            <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=3 ? '' : '-o';?>"></i>
                            <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=4 ? '' : '-o';?>"></i>
                            <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=5 ? '' : '-o';?>"></i>
                        </div>
                    </div>
                    <div class="candidate-details">
                        <div id="beforeReamFull"><?php $msg = $get_job_applicant->applying_massage;
                            if(strlen($msg)>50 ){ echo substr($msg, 0, 250).'<a >'; } else  echo $msg;  ?><a onclick="$('#beforeReamFull').hide(); $('#afterReadFullBtn').show();" style="cursor: pointer"> Read More</a>
                        </div>
                        <div style="display: none" id="afterReadFullBtn"><?php echo $get_job_applicant->applying_massage;?></div>
                    </div>
                    <div class="candidate-budget">
                        <h5>Budget : <?php echo $get_job_applicant->budget; ?></h5>
                        <h5>Work_days : <?php echo $get_job_applicant->work_days; ?></h5>
                        <h5>Attachment : <?php echo !empty($get_job_applicant->attachment) ?

                                '<a target="_blank" href="' . base_url() . 'images/employeer_file/' . $get_job_applicant->attachment . '">Yes</a>' : 'No'; ?></h5>
                    </div>
                    <div class="action-button">

<!--//////////////////////-->
                        <?php
                        if($get_job_details->user_id == $this->session->userdata('userid')){
                        ?>
                            <form role="form" action="<?php echo base_url();?>index.php/job_list/job_shortlisted" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('userid') ?>" />
                                <input type="hidden" name="job_id" value="<?php echo $get_job_details->id; ?>" />
                                <input type="hidden" name="freelancer_id" value="<?php echo $get_job_applicant->user_id; ?>" />
                                <input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>
                                <?php
                                $free_id = $get_job_applicant->freelancer_id;
                                $job_id = $get_job_applicant->job_id;
                                $this->db->select('*');
                                $this->db->from('shortlist');
                                $this->db->where('freelancer_id',$free_id);
                                $this->db->where('job_id',$job_id);
                                $query_result=$this->db->get();
                                $result=$query_result->num_rows();
                                if($result != 0 ){echo '<input class="btn btn-block btn-primary"  value="Shortlisted"/>';}
                                else{ echo '<input class="btn btn-block btn-primary" type="submit" value="Shortlist" name="submit" />';}
                                ?>

                            </form>


                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $get_job_applicant->user_id;?>" style="margin-top:5px">Contact</button>
                            <?php
                            if($get_job_applicant->hiring_status == 1){
                                ?>
                                <button type="button" class="btn btn-block btn-primary">Hired</button>
                            <?php }else{?>
                                <button type="button" id="hire_btn" class="btn btn-block btn-primary" value="<?php echo $this->session->userdata('userid') ?>" onclick="hire(<?php echo $get_job_details->id ?>,<?php echo $get_job_applicant->user_id ?>)">Hire</button>
                            <?php }
                        }?>
<!--//////////////////////-->

                        <script>
                            function hire(jobId,applicantId){
                                var data = 'id='+jobId+'&applicantId='+applicantId;
                                if(confirm("Do you confirm?")){
                                    $.ajax({
                                        url:'<?php echo base_url();?>index.php/Job_list/hire',
                                        data: data,
                                        type:'POST',
                                        success:function(data){
                                            alert('Hired');
                                            document.getElementById('hire_btn').firstChild.data = 'Hired';
                                        }
                                    });
                                }
                            }
                        </script>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div><!-- /.applicants -->
<?php  } ?>
</main>
</div>
</div>
</section>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="count">
                        <h1 class="users" data-number="2000"></h1>
                        <h5>Registered Users</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="count">
                        <h1 class="posted" data-number="1000"></h1>
                        <h5>Jobs Posted</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="count">
                        <h1 class="completed" data-number="1500"></h1>
                        <h5>Jobs Completed</h5>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Sign up for Zerpro Updates</h4>
                    <form action="" class="footer-singup">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email here">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="button">Submit</button>
					      </span>
                        </div><!-- /input-group -->
                    </form>
                    <div class="social-icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <h4>Quick Access</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-6 -->
            </div>
        </div>

    </div><!-- /.footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="copyright"><a href="#">&copy; ZerPro,</a> 2016</p>
                </div>
                <div class="col-md-6">
                    <p class="dev">Proudly Developed by Technovicinity</p>
                </div>
            </div>
        </div>
    </div><!-- /.footer-bottom -->
</footer>




<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/count-timer.js"></script>
<script src="<?php echo base_url();?>assets/js/scripts.js"></script>

</body>
</html>