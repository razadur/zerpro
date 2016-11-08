<?php include('header.php');?>

<style>
.btn.btn-info {
    background: #eee none repeat scroll 0 0;
    border: 1px solid #ccc;
    color: #08789A;
    font-size: 12px;
    font-weight: bold;
	text-decoration:underline;
}
.btn.btn-info ul{
	list-style:none;
	}
.btn.btn-info li{
	float:left;
	width:25%;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	

	<section class="main-containt">
		<div class="container">
			<div class="row">
				<?php include('left_menu.php');?>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
					  <h3>Messages</h3>
                      
					  <div class="applicants">
					<?php foreach($messages_job_ids as $messages_job_id){ ?>
                    
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_<?php echo $messages_job_id->subject_id; ?>"><ul><li><?php
												$this->load->model('admin_panel_model');
												echo $this->admin_panel_model->get_username($messages_job_id->sender_by);
										
										?></li><li><b><?php echo $messages_job_id->subject; ?></b></li><li>
										
		<?php
			$this->load->model('admin_panel_model');
			echo $this->admin_panel_model->get_last_date($messages_job_id->subject_id);
		?>								
										
	</li></ul></button>
  <div style="padding:10px;" id="demo_<?php echo $messages_job_id->subject_id; ?>" class="collapse">
   
									
					<?php 	
					$subject_id = $messages_job_id->subject_id;
 						$messages_job_ids = $this->admin_panel_model->get_message($subject_id);
						
						//print_r($messages_job_ids[0]->message);
						
						
						?>
						<div class="container">
  <!-- Trigger the modal with a button -->
  

  <!-- Modal --> 
  
</div>
						
					<?php foreach($messages_job_ids as $message){
							
						
							if($message->sender_by == $this->session->userdata('userid'))
							{ ?>
							
							<div style="border-bottom:1px solid #ccc;">
								<h5 style="border-bottom:1px solid #ccc; font-weight:bold;">Wednesday,<?php echo $message->message_date; ?></h5>
								
								<p>
									<?php echo $message->message; ?>
								</p>
								
							</div>
							
							
							<?php } else { ?>
							<div style="border-bottom:1px solid #ccc;">
								<h5 style="border-bottom:1px solid #ccc; font-weight:bold;">Wednesday,<?php echo $message->message_date; ?></h5>
								
								<p>
									<?php echo $message->message; ?>
								</p>
								
							</div>	
							
						<?php } } 
						
						//print_r ($this->admin_panel_model->get_message(14));
						?>
						
						<script>
$(document).ready(function(){
    
    $("#show_<?php echo $subject_id; ?>").click(function(){
	//alert('hellow');
        $("#reply_form_<?php echo $subject_id; ?>").show();
        $("#show_<?php echo $subject_id; ?>").hide();
    });
});
</script>
							
					  <button style="width:25%;" class="btn btn-primary btn-block" id="show_<?php echo $subject_id; ?>">Replay</button>
						
                            <div id="reply_form_<?php echo $subject_id; ?>" style=" display:none;width:90%; margin:0 auto; margin-top:30px;">
                            	<form role="form" action="<?php echo base_url();?>index.php/job_list/message_send" method="POST"  enctype="multipart/form-data">
				<textarea name="message" style="width:100%" placeholder="Enter Reply Message"></textarea>
									<input type="hidden" name="freelancer_id" value="<?php echo $this->session->userdata('userid') ?>" />
									<input type="hidden" name="job_id" value="<?php echo $messages_job_id->job_id; ?>" />
									<input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>"/>
								<input type="hidden" name="emp_id" value="<?php echo $messages_job_id->emp_id; ?>" />
							<input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>
									
									<input style="width:25%;" class="btn btn-primary btn-block" type="submit" value="Send" name="submit" />
								</form>
                                
                                <div style="clear:both;"></div>
                             </div>
                                
                                <br/>
                            
                            
                            
                           
  </div>
                    
                    
                    
					<h4><?php //echo $messages_job_id->subject; ?></h4>
						
								
								
								<?php } ?>
								
								
							
					</div>
					  
					  
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>