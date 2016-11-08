<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zerpro HTML Template</title>
	<link rel="stylesheet" href="<?php echo base_url();?>style.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style.css">
	<script src="<?php echo base_url();?>js/modernizr-custom.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="logo">
						<a href="index.html">
							<img class="img-responsive" src="<?php echo base_url();?>assets/images/logo.png" alt="Zerpro">
						</a>					
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<ul class="user-menu">
						<li><a href="#" class="btn">Login</a></li>
						<li><a href="#" class="btn">Sign up</a></li>
					</ul>
				</div>
				<div class="col-md-5 col-sm-5">
					<ul class="find-button">
						<li><a href="#" class="btn btn-borderd">Find a job</a></li>
						<li><a href="#" class="btn btn-borderd">Find an Expert</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- /.header -->
	
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Job title Here</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="main-containt">
		<div class="container">
			<div class="row">
				<aside class="col-md-3 col-sm-3">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profile
                     </button>
					 <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manege Job
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Job In Process</a></li>
                        <li><a href="#">Past Job</a></li>
                        <li><a href="#">Job Posts</a></li>
                      </ul>
                    </div>
                    
                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Message
                     </button>
                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Notification
                     </button>
                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Shortlist Candidate
                     </button>
                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Logout
                     </button>
                     
				</aside>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
                    	<h2>Welcome <?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></h2>
						
						<div class="col-md-3">
							<img src="http://placehold.it/180x180" alt="Profile Picture">
							
						</div>
						<div class="col-md-9">
							<div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Name:</label>
							
                            <?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?>
                          </div>
                          </div>
						  	<div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
							
                            <?php echo $user_details->user_email; ?>
                          </div>
                          </div>
						  	<div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Type:</label>
							
                            <?php echo $user_details->user_type; ?>
                          </div>
                          </div>
						  	<div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1"><a href="<?php echo base_url();?>index.php/user_panel/update_profile">Update Your Account</a></label>
							
                          </div>
                          </div>
						</div>
						
						<div class="clearfix"></div>
						<br/><br/>
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->

	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="count">
							<h1 class="users" data-number="2000"></h1>
							<h5>Registered Users</h5>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="count">
							<h1 class="posted" data-number="1000"></h1>
							<h5>Jobs Posted</h5>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="count">
							<h1 class="completed" data-number="1500"></h1>
							<h5>Jobs Completed</h5>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer-top -->

		<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h4>Sign up for Zerpro Updates</h4>
					<form action="" class="footer-singup">
						<div class="input-group">
					      <input type="text" class="form-control" placeholder="Email here">
					      <span class="input-group-btn">
					      		<button class="btn btn-primary" type="button">Submit</button>
					      </span>
					    </div><!-- /input-group -->
					</form>
					<div class="social-icon">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div><!-- /.col-md-6 -->
				<div class="col-md-6">
					<h4>Quick Access</h4>
					<div class="row">
						<div class="col-md-6">
							<ul class="footer-menu">
								<li><a href="#">About</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms and Conditions</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="footer-menu">
								<li><a href="#">About</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms and Conditions</a></li>
							</ul>
						</div>
					</div>
				</div><!-- /.col-md-6 -->
			</div>
		</div>
			
		</div><!-- /.footer-middle -->

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p class="copyright"><a href="#">&copy; ZerPro,</a> 2016</p>
					</div>
					<div class="col-md-6">
						<p class="dev">Proudly Developed by Technovicinity</p>
					</div>
				</div>
			</div>
		</div><!-- /.footer-bottom -->
	</footer>

	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>
	<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/count-timer.js"></script>
	<script src="<?php echo base_url();?>assets/js/scripts.js"></script>

</body>
</html>