<aside class="col-md-3 col-sm-3">
                	  <?php if($this->session->userdata('user_type') == 'Employeer'){ ?>
                     <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
					 <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel/create_job">Create Job</a>
                     <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list">Joblist</a>
					 <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/shortlist">Shortlist</a>
					 <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
                     <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
                     <?php } ?>
					 
                   <?php if($this->session->userdata('userid')){ ?>
				   
					<?php
					
					
					 if($this->session->userdata('user_type') == 'Frelancer'){ ?>
					<a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
					<a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
					<a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
					<a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
					<?php } ?>
					
                     <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
                     <?php } ?>
                     
				</aside>