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
					  <h2>On Going Jobs</h2>
                      
					  <div class="applicants">
					<?php foreach($onGoing_job_ids as $onGoing_job_id){
                        ?>
                          <div class="media-body">
                              <div class="col-md-9">
                                  <h3><?php echo $onGoing_job_id->job_title; ?></h3>
                                  <p><?php echo $onGoing_job_id->job_description; ?></p>
                                  <dl class="row">
                                      <dt class="col-sm-5">Budget:</dt>
                                      <dd class="col-sm-7"><?php echo $onGoing_job_id->budget; ?></dd>
                                      <dt class="col-sm-5">Experience:</dt>
                                      <dd class="col-sm-7"><?php echo $onGoing_job_id->experience; ?></dd>
                                      <dt class="col-sm-5">Qualification:</dt>
                                      <dd class="col-sm-7"><?php echo $onGoing_job_id->qualification; ?></dd>
                                      <dt class="col-sm-5">Vacancy Type:</dt>
                                      <dd class="col-sm-7"><?php echo $onGoing_job_id->vacancy_type; ?></dd>
                                      <dt class="col-sm-5">Employee:</dt>
                                      <dd class="col-sm-7"><?php echo $onGoing_job_id->name; ?></dd>
                                  </dl>
                              </div>
                              <div class="col-md-3">
                                  <?php if($this->session->userdata('user_type') != 'Frelancer'){?>
                                  <button id="closeJob" class="btn btn-block btn-primary" onclick="closeJob(<?php echo $onGoing_job_id->id ?>)">Close Job</button>
                                  <?php }?>
                                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $onGoing_job_id->fl_id; ?>" style="text-align: center">Contact</button>
                              </div>
                          </div>
                        <!--/////////////////////////model////////////////////-->
                        <div class="modal fade" id="myModal_<?php echo $onGoing_job_id->fl_id; ?>" role="dialog">
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
                                            <input type="hidden" name="job_id" value="<?php echo $onGoing_job_id->id; ?>" />
                                            <input type="hidden" name="freelancer_id" value="<?php echo $onGoing_job_id->fl_id; ?>" />
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
                        <!--/////////////////////////////////////////////-->
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
    function closeJob(jobId){
        var data = 'id='+jobId;
        $.ajax({
            url:'<?php echo base_url();?>index.php/Job_list/closeJob',
            data: data,
            type:'POST',
            success:function(data){
                //$('#closeJob').hide();
                location.href = "<?php echo base_url();?>index.php/Job_list/jobFeedback/"+jobId;
                //alert(data);
                //document.getElementById('hire_btn').firstChild.data = 'Hired';
            }
        });
    }
</script>