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
                    <?php if ($this->session->flashdata('flasherror')) {echo '<div class="alert alert-success">'.$this->session->flashdata('flasherror').'</div>'; }?>
                    <br/>
						<div class="col-md-3">
							<img src="<?php echo base_url(); ?>images/users/<?php echo $user_details_info->user_pic_one; ?>" alt="Profile Picture" width="180" height="180">
						</div>
						<div class="col-md-3">
							<span style="font-weight:bold; font-size:20px;"><?php echo $user_details_info->name; ?></span>                     <?php //echo $user_details_info->id; ?>
							<br/><br/>
							<div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div>
							<div style="padding-bottom:5px;"><b>Location: </b><?php echo $user_details_info->complete_address; ?></div>
							<div style="padding-bottom:5px;"><b>Phone: </b><?php echo $user_details_info->phone_no; ?></div>
							<div style="padding-bottom:5px;"><b>Email: </b><?php echo $user_details_info->user_email; ?> </div>
						</div>
						<div class="col-md-3">
							<label><a href="<?php echo base_url();?>index.php/user_panel/update_profile">Edit Profile </a></label>
							<?php if($packageInfo[0]->job_geting_package != 1){?>
                                <label >
                                    <form name="frm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                        <div style="">
                                            <input type="hidden" name="cmd" value="_xclick" />
                                            <input type="hidden" name="business" value="patrickmotors-facilitator@yahoo.com" />
                                            <input type="hidden" name="amount" value="10" />
                                            <input type="hidden" name="no_shipping" value="1" />
                                            <input type="hidden" name="no_note" value="1" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="lc" value="USD" />
                                            <input type="hidden" name="item_name" value="Registration" />
                                            <input type="hidden" name="bn" value="PP-BuyNowBF" />
                                            <input type="hidden" name="return" value="<?php echo base_url();?>index.php/user_panel/package_update" />
                                            <input type="hidden" name="rm" value="2" />
                                            <input type="submit"  border="0" name="submit" value="Package Update" alt="Make payments with PayPal - it's fast, free and secure!" class="additional_height button"  class="btn btn-borderd" title="Make payments with PayPal - it's fast, free and secure!" />
                                            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                                        </div>
                                    </form>
    <!--                                <a href="--><?php //echo base_url();?><!--index.php/user_panel/package_update"> Package Update</a>-->
                                </label>
                            <?php }?>
							</br/>
							<span style="padding-left:15%;font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Opens Jobs</span>
						</div>
						<div class="col-md-3" style="text-align:center;">
						<br/>
							<span style="font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Jobs Completed</span>
						</div>
						
						<div class="clearfix"></div>
						<hr/>
						<div class="col-md-9">
							<span style="font-weight:bold; font-size:20px;">About</span>
							<br/>
							<p>
							<?php echo $user_details_info->description; ?>
								
							</p>
						</div>
						<div class="col-md-3" style="text-align:center">
							<span style="font-weight:bold; font-size:20px;">Spcilization</span>
							<br/>
							<?php echo $user_details_info->spcialization; ?>
							
						</div>
						<div class="clearfix"></div>
						
						<hr/>
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Protfolio</span>
							<br/>
							<div class="row">
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
							</div>
							<br/><br/>
							<div class="row">
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
								<div class="col-md-3">
									<img src="http://placehold.it/180x180" alt="Profile Picture">
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<br/>
						<hr/>
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Experience</span>
							<br/>
							<span style="font-weight:bold; font-size:16px;">Job Position:</span><?php echo $user_details_info->job_position; ?>
							<br/>
							<div style="padding-bottom:5px;"><b>Company Name: </b><?php echo $user_details_info->company_name; ?> </div>
							<div style="padding-bottom:5px;"><b>Comapy Type: </b><?php echo $user_details_info->company_type; ?></div>
							<p>
								
							</p>
							
							
							
						</div>
						<div class="clearfix"></div>
						
						<hr/>
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Education</span>
							<br/><br/>
							<span style="font-weight:bold; font-size:14px;">Degree:</span>
							<?php echo $user_details_info->degree_name; ?>
							<br/>
							<span style="font-weight:bold; font-size:14px;">Institue name:</span><?php echo $user_details_info->institue_name; ?>
							<br/>
							<span style="font-weight:bold; font-size:14px;">Year:</span><?php echo $user_details_info->year; ?>

						<br/><br/>
							
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