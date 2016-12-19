<?php include('header.php');
$user_id = $this->session->userdata('userid');
$this->load->model('admin_panel_model');
$data['user_details'] = $this->admin_panel_model->user_details($user_id);
//print_r($data);
if(!empty($data['user_details']->user_email)){
    $user_email = $data['user_details']->user_email;
$data['get_user_type'] = $this->admin_panel_model->get_user_type($user_email);
}
?>

<style>
.job-item{
padding:15px 0px;
}
</style>
	
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Job List</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="main-containt">
		<div class="container">
			<div class="row">
				<?php
                if(!empty($data['get_user_type'])){
                    if($data['get_user_type'] == 'Employeer'){
                        ?>
                        <aside class="col-md-3 col-sm-3">
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel/create_job">Create Job</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/job_list">Joblist</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/shortlist">Shortlist</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                            <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
                        </aside>

                    <?php
                    }else{
                        include('job_list_left.php');
                    }
                }else{
                    include('job_list_left.php');
                }
                ?>
				<main class="col-md-9 col-sm-9">
				<div id="jobList">
				<?php foreach($get_job_lists as $get_job_list){ ?>
					<div class="media job-item">
						<div class="media-left">
							<img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_list->user_pic_one; ?>" width="200" height="200" />
							
						</div>
						<div class="media-body">
							<div class="job-info ">
								<h2><?php if($this->session->userdata('userid')){?>
											<a href="<?php echo base_url();?>index.php/job_list/job_details/<?php echo $get_job_list->id; ?>"><?php echo $get_job_list->job_title; ?></a>
											
											<?php } else{ ?>
											<a href="<?php echo base_url();?>index.php/welcome/job_details/<?php echo $get_job_list->id; ?>"><?php echo $get_job_list->job_title; ?> </a>
											<?php } ?></h2>
								<div class="row">
									<div class="col-sm-6 col-xs-7">
										<dl class="row">
											<dt class="col-md-3">Budget:</dt>
											<dd class="col-md-9"><?php echo $get_job_list->budget; ?></dd><br>
											<dt class="col-md-3">Posted:</dt>
											<dd class="col-md-9"><?php echo date('m-d-Y',strtotime($get_job_list->entry_date));?></dd><br>
											<dt class="col-md-3">Specialization:</dt>
											<dd class="col-md-9"><?php echo str_replace(',',', ',$get_job_list->spcialization);?></dd><br>
											<dt class="col-md-3">Preference:</dt>
											<dd class="col-md-9"><?php echo $get_job_list->vacancy_type; ?></dd><br>
											<dt class="col-md-3">Location:</dt>
											<dd class="col-md-9"><?php echo $get_job_list->description; ?></dd><br>
										</dl>
									</div>
									<div class="col-sm-6 col-xs-5">
										<div class="action-btn">
										<?php if($this->session->userdata('userid')){?>
											<a class="btn btn-primary" href="<?php echo base_url();?>index.php/job_list/job_details/<?php echo $get_job_list->id; ?>">Job Details </a>
											
											<?php } else{ ?>
											<a class="btn btn-primary" href="<?php echo base_url();?>index.php/welcome/job_details/<?php echo $get_job_list->id; ?>">Job Details </a>
											<?php } ?>
											<!--<button class="btn btn-primary">Add to Watchlist</button>-->
										</div>
									</div>
								</div>
							</div>
							<div class="job-desc">
								<p><strong>Description:</strong> <?php echo $get_job_list->job_description; ?></p>								
							</div>
						</div>
					</div><!-- /.media -->
				<?php } ?>
                </div>
				</main>
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>