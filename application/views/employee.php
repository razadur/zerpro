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
                    	<h2>Welcome <?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></h2>
						<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php }else{} ?>
						
                        <form  role="form" action="<?php echo base_url();?>index.php/user_panel/update_user_info" method="POST"  enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $user_details->id; ?>"/>
						<input type="hidden" name="user_type" value="<?php echo $user_details->user_type; ?>"/>
						<input type="hidden" name="user_email" value="<?php echo $user_details->user_email; ?>"/>
						<input type="hidden" name="spcialization[]" value="0"/>
						
                          <div class="col-md-2">
                          	<div class="profile-pic">
                                <img src="http://placehold.it/100x100" alt="Profile Picture">
                            </div>
                          </div>
                          <div class="col-md-10">
                          	<div class="form-group">
                                <input type="file" id="exampleInputFile" name="user_pic_one">
                                <p class="help-block">Example block-level help text here.</p>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                         
                          <br/>
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="Text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?>">
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          
                          
                          
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                           <div class="col-md-6">
                          	 <label for="exampleInputEmail1">Social Network</label>
                          	<div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Facebook"  name="facebook_link">
                         	</div>
                            <div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Twitter Link" name="twitter_link">
                         	</div>
                          </div>
                          <div class="col-md-6">
                          	<label for="exampleInputEmail1"></label>
                          	<div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Youtube Link" name="youtube_link">
                         	</div>
                            <div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Google Plus Link" name="google_plus_link">
                         	</div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <div class="col-md-6">
                          	 <label for="exampleInputEmail1">Contact Information</label>
                          	<div class="form-group">
                            	<label for="exampleInputEmail1">Phone Number</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="phone_no">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">Website</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="website">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">City</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="city">
                         	</div>
                          </div>
                          <div class="col-md-6">
                          	<label for="exampleInputEmail1"></label>
                          	<div class="form-group">
                            	<label for="exampleInputEmail1">Alternative Email Address</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="alt_email_address">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">Country</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="country">
                         	</div>
                            <div class="form-group">
                            	 <label for="exampleInputEmail1">Complete Address</label>
                           		<textarea name="complete_address" class="form-control" rows="3"></textarea>
                         	</div>
                          </div>
                          <div class="clearfix"></div>
                          
                          
                          
                          <div class="col-md-12">
                          <button type="submit" class="submit_btn btn btn-default">Submit</button>
                          </div>
						   <div class="clearfix"></div>
						   <br/>
						</form>
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>