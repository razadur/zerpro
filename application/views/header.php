<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zerpro</title>
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
						<a href="<?php echo base_url(); ?>">
							<img class="img-responsive" src="<?php echo base_url();?>assets/images/logo.png" alt="Zerpro">
						</a>					
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<ul class="user-menu">
					<?php if($this->session->userdata('userid')){ ?>
						<li><a href="<?php echo base_url();?>index.php/user_panel" class="btn">Profile</a></li>
						
						<li><a href="<?php echo base_url();?>index.php/login/logout" class="btn">Logout</a></li>
						
						<?php } else{?>
							<li><a href="<?php echo base_url();?>index.php/welcome/login" class="btn">Login</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/registration" class="btn">Sign up</a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-5 col-sm-5">
					<ul class="find-button">
						<li><a href="<?php echo base_url(); ?>index.php/welcome/joblist" class="btn btn-borderd">Find a job</a></li>
						<li><a href="#" class="btn btn-borderd">Find an Expert</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- /.header -->