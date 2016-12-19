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
<!--				--><?php //include('left_menu.php');?>
                <aside class="col-md-3 col-sm-3">
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel/create_job">Create Job</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list">Joblist</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/shortlist">Shortlist</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
                </aside>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
					<br/>
						<div class="col-md-3">
                            <?php if(!empty($user_details_info->user_pic_one)) { $user_details_info->user_pic_one; ?>
                                <img src="<?php echo base_url(); ?>images/users/<?php echo $user_details_info->user_pic_one; ?>" alt="Profile Picture" width="180" height="180">
                            <?php }else{?>
							<img src="http://placehold.it/180x180" alt="Profile Picture">
                            <?php }?>
						</div>
						<div class="col-md-3">
							<span style="font-weight:bold; font-size:20px;"><?php echo $user_details_info->name;?></span>
							<br/><br/>
							<div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div>
							<div style="padding-bottom:5px;"><b>Location: </b><?php echo $user_details_info->city; ?></div>
							<div style="padding-bottom:5px;"><b>Phone: </b><?php echo $user_details_info->phone_no; ?></div>
							<div style="padding-bottom:5px;"><b>Email: </b><?php echo $user_details_info->user_email; ?> </div>
                            <?php if(!empty($user_details_info->facebook_link)){?> <div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->facebook_link; ?>"> <span class="i i-facebook"></span> <img alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png"></a></b></div>
                            <?php }if(!empty($user_details_info->twitter_link)){?> <div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->twitter_link; ?>"> <img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a></b></div>
                            <?php }if(!empty($user_details_info->youtube_link)){?><div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->youtube_link; ?>"> <img alt="follow me on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png" border=0></a></b></div>
                            <?php }if(!empty($user_details_info->website)){?><div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->website; ?>"> <img width="30" alt="follow my web" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYWbkNNcgD5MfDt6xhAur4wZvYRRGa50nWjSyAWEhT8tNF8Y72BA"></a></b></div>
                            <?php }?>
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
                                <?php echo $user_details_info->description;?>
							</p>
                            <div style="padding-bottom:5px;"><b>Complete Address: <?php echo $user_details_info->complete_address; ?> </b></div>
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
                        <div class="col-md-12">
                            <label><a href="<?php echo base_url();?>index.php/user_panel/delete_profile">Delete Profile</a></label>
                        </div>
                        <div class="clearfix"></div>
                        <br/><br/>
                    </div>
					<br/>
                </main>
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>