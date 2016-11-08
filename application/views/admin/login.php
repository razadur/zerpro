<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zerpro | Login</title>

    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="<?php echo base_url();?>assets/images/logo.png"/></h1>

            </div>
            <h3>Welcome to ZerPro</h3>
            
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="<?php echo base_url();?>index.php/admin_login" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <input type="email" name="user_email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group"> 
                    <input type="password" name="user_password" class="form-control" placeholder="Password" required="">
                </div>
				<input type="submit" name="submit" value="Login" class="btn btn-primary block full-width m-b"/>
                <!--<button type="submit" class="btn btn-primary block full-width m-b">Login</button>-->

               
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>

</body>

</html>
