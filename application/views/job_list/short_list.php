<?php include('header.php');?>
	
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
				<?php  include('left_menu.php');?>
				<main class="col-md-9 col-sm-9">
				
				<?php foreach($get_job_lists as $get_job_list){ ?>
					<div class="media job-item">
						<div class="media-left">
							<img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_list->user_pic_one; ?>" width="60" height="60" />
						</div>
						<div class="media-body">
							<div class="job-info ">
								<h2><?php echo $get_job_list->job_title; ?></h2>

                                    <div class="action-btn">
                                        <form role="form" action="<?php echo base_url();?>index.php/job_list/job_details/<?php echo $get_job_list->id; ?>" method="POST"  enctype="multipart/form-data">
                                            <input class="btn btn-primary" type="submit" value="Shortlist" name="shortlist"/>
                                        </form>
                                        <!--<button class="btn btn-primary">Add to Watchlist</button>-->
                                    </div>
							</div>
							<div class="job-desc">
								<p><strong>Description:</strong> <?php echo $get_job_list->job_description; ?></p>								
							</div>
						</div>
					</div><!-- /.media -->

				<?php } ?>

				</main>
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>