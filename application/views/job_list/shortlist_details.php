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
					
					<?php if($get_job_shortlists)
					{ ?>
					
					<div class="applicants">
					<h3>Shortlistes</h3>
					<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php } ?>
					
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
									<input type="hidden" name="job_id" value="<?php echo $get_job_shortlist->job_id; ?>" />
								<input type="hidden" name="freelancer_id" value="<?php echo $get_job_shortlist->user_id; ?>" />
                                <input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>
								<input type="hidden" value="shortlist" name="shortlist"/>
									
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
									<h5>$<?php echo $get_job_shortlist->expeted_salary; ?></h5>
								</div>
								<div class="action-button">
									
									<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $get_job_shortlist->user_id; ?>">Contact</button>
									<!--<button class="btn btn-block btn-primary">Contact</button>-->
								</div>
							</li>
							
						<?php } ?>

														
						</ul>
					</div>
					
					<?php }else{?>
					
					<div class="applicants">
					<h3>applicants</h3>
					<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php } ?>
						<ul class="applicants-list employer">
						<?php foreach($get_job_applicants as $get_job_applicant){ ?>
							<li>
								<div class="candidate-pic"><img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_applicant->user_pic_one; ?>" width="60" height="60" /></div>
								<div class="candidate-dis">
									<a href="#" class="candidate-name"><?php echo $get_job_applicant->name; ?></a>
									<div class="star">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
								</div>
								<div class="candidate-details">
									<p><?php echo $get_job_applicant->description; ?> <a href="#">Read more</a></p>
								</div>
								<div class="candidate-budget">
									<h5>$<?php echo $get_job_applicant->expeted_salary; ?></h5>
								</div>
								<div class="action-button">
								
									
								<form role="form" action="<?php echo base_url();?>index.php/job_list/job_shortlisted" method="POST"  enctype="multipart/form-data">
									<input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('userid') ?>" />
									<input type="hidden" name="job_id" value="<?php echo $get_job_details->id; ?>" />
								<input type="hidden" name="freelancer_id" value="<?php echo $get_job_applicant->user_id; ?>" />
									
									<input class="btn btn-primary btn-block" type="submit" value="Shortlisted" name="submit" />
								</form>
								
									
									<button class="btn btn-block btn-primary">Contact</button>
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