	<?php include('header.php');?>
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>category/subcategory</h4>
					<h1><?php echo $get_job_details->job_title; ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="main-containt">
		<div class="container">
			<div class="row">
				<main>
					<div class="job-overview clearfix">
						<div class="col-md-9">
							<div class="job-des">
								<h3>Job overview</h3>
								<p><?php echo $get_job_details->job_description; ?></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="job-details">

							</div>
						</div>
					</div><!-- /.job-overview -->
                    <div class="job-overview clearfix">
                        <div class="job-des">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form action="<?php echo base_url();?>index.php/job_list/job_application"" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="budget">Budget</label>
                                    <div class="form-group">
                                        <input id="budget" class="form-control"   name="budget" type="Text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="work_days">Working days</label>
                                    <div class="form-group">
                                        <input id="work_days" class="form-control"   name="work_days" type="Text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="applying_massage">Massage</label>
                                    <div class="form-group">
                                        <textarea id="Massage" class="form-control"   name="applying_massage"></textarea>
                                    </div>
                                    <label for="attachment">Attachment</label>
                                    <div class="form-group">
                                        <input id="attachment"   name="attachment" type="file">
                                    </div>
                                    <input type="submit" value="Apply" class="btn btn-borderd pull-right">
                                    <input type="hidden" name="job_id" value="<?php echo $job_id;?>">
                                    <input type="hidden" name="freelancer_id" value="<?php echo $freelancer_id;?>">
                                </div>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
				</main>
			</div>
		</div>
	</section>

	<?php include('footer.php');?>