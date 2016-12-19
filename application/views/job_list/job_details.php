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
                                    <dd class="col-md-7"><?php echo str_replace(',',', ',$get_job_details->spcialization);?></dd><br>
                                </dl>
								<!--<button class="btn btn-primary btn-block">Shortlist</button>-->
								<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php } ?>

                                <?php if(!empty($get_job_applicants)){
                                    if($get_job_applicants[0]->freelancer_id != $get_job_applicants[0]->user_id ){?>
                                        <form role="form" action="<?php echo base_url();?>index.php/job_list/job_apply" method="POST"  enctype="multipart/form-data">
                                            <input type="hidden" name="freelancer_id" value="<?php echo $this->session->userdata('userid') ?>" />
                                            <input type="hidden" name="job_id" value="<?php echo $get_job_details->id; ?>" />
                                            <input class="btn btn-primary btn-block" type="submit" value="Apply" name="submit" />
                                        </form>
                                <?php }
                                }else{?>
                                        <form role="form" action="<?php echo base_url();?>index.php/job_list/job_apply" method="POST"  enctype="multipart/form-data">
                                            <input type="hidden" name="freelancer_id" value="<?php echo $this->session->userdata('userid') ?>" />
                                            <input type="hidden" name="job_id" value="<?php echo $get_job_details->id; ?>" />
                                            <input class="btn btn-primary btn-block" type="submit" value="Apply" name="submit" />
                                        </form>
                                <?php    }?>
								<!--<button class="btn btn-primary btn-block">Apply</button>-->
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
					<div class="applicants">
					<h3>applicants</h3>
						<ul class="applicants-list">
							<?php foreach($get_job_applicants as $get_job_applicant){ ?>
                                <div class="col-md-12">
								    <div class="col-md-1">
                                        <a href="<?php echo base_url();?>index.php/withoutLogin_jobList/frelancer_public_profile/<?php echo $get_job_applicant->freelancer_id?>/<?php echo $get_job_applicant->name; ?>">
                                            <img src="<?php echo base_url(); ?>images/users/<?php echo $get_job_applicant->user_pic_one; ?>" width="60" height="60" />
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="candidate-name" href="<?php echo base_url();?>index.php/withoutLogin_jobList/frelancer_public_profile/<?php echo $get_job_applicant->freelancer_id?>/<?php echo $get_job_applicant->name; ?>"><?php echo $get_job_applicant->name; ?></a>
                                        <?php
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
                                    <div class="col-md-7">
                                        <div id="beforeReamFull"><?php $msg = $get_job_applicant->applying_massage;
                                            if(strlen($msg)>50 ){ echo substr($msg, 0, 250).'<a >'; } else  echo $msg;  ?><a onclick="$('#beforeReamFull').hide(); $('#afterReadFullBtn').show();" style="cursor: pointer"> Read More</a>
                                        </div>
                                        <div style="display: none" id="afterReadFullBtn"><?php echo $get_job_applicant->applying_massage;?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Budget : <?php echo $get_job_applicant->budget; ?></h5>
                                        <h5>Work_days : <?php echo $get_job_applicant->work_days; ?></h5>
                                        <h5>Attachment : <?php echo !empty($get_job_applicant->attachment) ?
                                                '<a target="_blank" href="' . base_url() . 'images/employeer_file/' . $get_job_applicant->attachment . '">Yes</a>' : 'No'; ?></h5>
                                        </h5>
                                    </div>
                                </div>
							<?php } ?>
						</ul>
					</div><!-- /.applicants -->





				</main>
			</div>
		</div>
	</section>

	<?php include('footer.php');?>