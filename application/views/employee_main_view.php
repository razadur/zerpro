<?php include('header.php');?>
	
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="main-containt">
		<div class="container">
			<div class="row">
				<?php include('left_menu.php');?>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
					<br/>
						<div class="col-md-3">
							<img src="http://placehold.it/180x180" alt="Profile Picture">
						</div>
						<div class="col-md-3">
							<span style="font-weight:bold; font-size:20px;"><?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></span> 
							<br/><br/>
							<div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div>
							<div style="padding-bottom:5px;"><b>Location: </b></div>
							<div style="padding-bottom:5px;"><b>Phone: </b></div>
							<div style="padding-bottom:5px;"><b>Email: </b><?php echo $user_details->user_email; ?> </div>
						</div>
                        <div class="col-md-3">
							<label for="exampleInputEmail1"><a href="<?php echo base_url();?>index.php/user_panel/update_profile">Edit Profile</a></label>
							<br/>
							<span style=" padding-left:15%;font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Open Jobs</span>
						</div>
                        
						<div class="col-md-3" style="text-align:center;">
						<br/>
							<span style="font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Jobs Completed</span>
						</div>
						
						<div class="clearfix"></div>
						<hr/>
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">About</span>
							<br/>
							<p>
							
								
							</p>
						</div>
						
						<div class="clearfix"></div>
						
						<hr/>
						
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Others Job From</span>
							<br/>
							<p>
							
								
							</p>
						</div>
						
						<div class="clearfix"></div>
						
						<hr/>
						
						
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Rating & Review</span>
							<br/>
							<p>
							
								
							</p>
						</div>
						
						<div class="clearfix"></div>
						
						<hr/>
						
						<br/>
						
						
						
						
						<br/><br/>
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>