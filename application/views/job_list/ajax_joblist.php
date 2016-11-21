<?php
/**
 * Created by PhpStorm.
 * User: aZad
 * Date: 11/16/16
 * Time: 10:51 PM
 */
foreach($get_job_lists as $get_job_list){ ?>
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
                            <dd class="col-md-9"><?php echo $get_job_list->budget; ?></dd>
                            <dt class="col-md-3">Posted:</dt>
                            <dd class="col-md-9">08/10/2016</dd>
                            <dt class="col-md-3">Specialization:</dt>
                            <dd class="col-md-9"><?php echo $get_job_list->spcialization; ?></dd>
                            <dt class="col-md-3">Preference:</dt>
                            <dd class="col-md-9"><?php echo $get_job_list->vacancy_type; ?></dd>
                            <dt class="col-md-3">Location:</dt>
                            <dd class="col-md-9"><?php echo $get_job_list->description; ?></dd>
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