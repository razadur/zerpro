<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-signin-client_id" content="164838490382-isprhgl5oi3rsktqt887gt23am2ehgd9.apps.googleusercontent.com">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zerpro</title>
    <link rel="stylesheet" href="<?php echo base_url();?>style.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style.css">
    <script src="<?php echo base_url();?>js/modernizr-custom.js"></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>

    <script>
        function onSuccess(googleUser) {
            var profile = googleUser.getBasicProfile();
            gapi.client.load('plus', 'v1', function () {
                var request = gapi.client.plus.people.get({
                    'userId': 'me'
                });
                //Display the user details
                request.execute(function (resp) {
                    /*var profileHTML = '<div class="profile"><div class="head">Welcome '+resp.name.givenName+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></div>';
                     profileHTML += '<img src="'+resp.image.url+'"/><div class="proDetails"><p>'+resp.displayName+'</p><p>'+resp.emails[0].value+'</p><p>'+resp.gender+'</p><p>'+resp.id+'</p><p><a href="'+resp.url+'">View Google+ Profile</a></p></div></div>';
                     $('.userContent').html(profileHTML);*/
                    signOut();
                    $('#name').val(resp.displayName);
                    $('#ename').val(resp.displayName);
                    $('#user_email').val(resp.emails[0].value);
                    $('#euser_email').val(resp.emails[0].value);
                    $('.hide_').hide();
                });
            });
        }
        function onFailure(error) {
            alert(error);
        }
        function renderButton() {
            gapi.signin2.render('gSignIn', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                $('.userContent').html('');
                $('#gSignIn').slideDown('slow');
            });
        }
    </script>

    <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                testAPI();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into Facebook.';
            }
        }

        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '191725827900246',
                cookie     : true,  // enable cookies to allow the server to access
                // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.8' // use graph api version 2.8
            });

            // Now that we've initialized the JavaScript SDK, we call
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });

        };

        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,email,permissions,friends', function(response) {
                console.log('Successful login for: ' + response.name);
//                document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '! your id is '+response.id+' and your email is '+response.email;
                document.getElementById('name').value = response.name;
                document.getElementById('email').value = response.email;
                $('#name').val(response.name);
                $('#ename').val(response.email);
                $('#user_email').val(response.name);
                $('#euser_email').val(response.email);
                $('.hide_').hide();
            });
        }
    </script>
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
                    <li><a href="<?php echo base_url(); ?>index.php/withoutLogin_jobList/frelancer_list" class="btn btn-borderd">Find an Expert</a></li>
                </ul>
            </div>
        </div>
    </div>
</header><!-- /.header -->
<script src="<?php echo base_url(); ?>countries.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 8) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
	 
	  document.getElementById("passwordDescription1").innerHTML = desc[score];
	 document.getElementById("passwordStrength1").className = "strength" + score;
}
</script>

	
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
				
                <main class="col-md-12 col-sm-12">
                 	<div class="candidate_panel" style="width:50%; margin:0 auto;">
                    	<h2>New User Registration</h2>
						 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
						
						<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php } ?>

  
	
	<!--<div id="ripon">
	 fsnfsdfjsdjfnj
	</div>
	<div id="ripon1" style="display:none;">
	 fsnfsdfjsdjfnj ripon
	</div>-->

                        
							
						 <div class="col-md-12">
						 	<div class="form-group hide_">
								 <label for="exampleInputEmail1">User Type</label><br/>
								 
								 <label class="radio-inline">
								 <input checked="checked" type="radio" name="user_type" id='watch-me' value="Frelancer">Frelancer
								   </label>
								   <label class="radio-inline">
								   <input type="radio" name="user_type" id='watch-me2' value="Employeer"> Employeer
	
								 
								</label>
                                <div id="gSignIn"></div>
<!--                                <div><fb:login-button scope="public_profile,email" onclick="checkLoginState();"> </fb:login-button></div>-->
							</div>
						 </div>
						 
						 <div class="clearfix"></div>
						 
						 
						 
						 <div id="ripon">
						 <form action="<?php echo base_url();?>index.php/welcome/new_user_registration_save" method="POST"  enctype="multipart/form-data" autocomplete="off">
							<input type="hidden" value="Frelancer" name="user_type" />
								 <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">First Name</label>
								<input value="<?php if(isset($first_name)){echo $first_name;}?>" type="Text" class="form-control" id="name" placeholder="Enter First Name" name="first_name"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Last Name</label>
								<input  value="<?php if(isset($last_name)){echo $last_name;}?>" type="Text" class="form-control" placeholder="Enter Last Name" name="last_name"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Email Address</label>
								<input  value="<?php if(isset($user_email)){echo $user_email;}?>" type="email" class="form-control" id="user_email" placeholder="Enter Email" name="user_email"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  
							  
							  <div class="clearfix"></div>
							  
							  
							  
							  
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Telephone</label>
								<input  value="<?php if(isset($user_tel)){echo $user_tel;}?>" type="text" class="form-control" placeholder="Enter Tel" name="user_tel"  value="" autocomplete="off">

							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <!--<div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Address</label>
								<textarea class="form-control" name="user_address"></textarea>

							  </div>
							  </div>-->
                             <div class="col-md-12">
                                 <div class="form-group hide_">
                                     <label for="exampleInputEmail1">City</label>
                                     <select id="state" class="form-control" name="user_city">
                                         <option value="">Select State</option>
                                         <option value="Adjuntas">Adjuntas</option>
                                         <option value="Aguada">Aguada</option>
                                         <option value="Aguadilla">Aguadilla</option>
                                         <option value="Aguas Buenas">Aguas Buenas</option>
                                         <option value="Aibonito">Aibonito</option>
                                         <option value="Anasco">Anasco</option>
                                         <option value="Arecibo">Arecibo</option>
                                         <option value="Arroyo">Arroyo</option>
                                         <option value="Barceloneta">Barceloneta</option>
                                         <option value="Barranquitas">Barranquitas</option>
                                         <option value="Bayamon">Bayamon</option>
                                         <option value="Cabo Rojo">Cabo Rojo</option>
                                         <option value="Caguas">Caguas</option>
                                         <option value="Camuy">Camuy</option>
                                         <option value="Canovanas">Canovanas</option>
                                         <option value="Carolina">Carolina</option>
                                         <option value="Catano">Catano</option>
                                         <option value="Cayey">Cayey</option>
                                         <option value="Ceiba">Ceiba</option>
                                         <option value="Ciales">Ciales</option>
                                         <option value="Cidra">Cidra</option>
                                         <option value="Coamo">Coamo</option>
                                         <option value="Comerio">Comerio</option>
                                         <option value="Corozal">Corozal</option>
                                         <option value="Culebra">Culebra</option>
                                         <option value="Dorado">Dorado</option>
                                         <option value="Fajardo">Fajardo</option>
                                         <option value="Florida">Florida</option>
                                         <option value="Guanica">Guanica</option>
                                         <option value="Guayama">Guayama</option>
                                         <option value="Guayanilla">Guayanilla</option>
                                         <option value="Guaynabo">Guaynabo</option>
                                         <option value="Gurabo">Gurabo</option>
                                         <option value="Hatillo">Hatillo</option>
                                         <option value="Hormigueros">Hormigueros</option>
                                         <option value="Humacao">Humacao</option>
                                         <option value="Isabela">Isabela</option>
                                         <option value="Jayuya">Jayuya</option>
                                         <option value="Juana Diaz">Juana Diaz</option>
                                         <option value="Juncos">Juncos</option>
                                         <option value="Lajas">Lajas</option>
                                         <option value="Lares">Lares</option>
                                         <option value="Las Marias">Las Marias</option>
                                         <option value="Las Piedras">Las Piedras</option>
                                         <option value="Loiza">Loiza</option>
                                         <option value="Luquillo">Luquillo</option>
                                         <option value="Manati">Manati</option>
                                         <option value="Maricao">Maricao</option>
                                         <option value="Maunabo">Maunabo</option>
                                         <option value="Mayaguez">Mayaguez</option>
                                         <option value="Moca">Moca</option>
                                         <option value="Morovis">Morovis</option>
                                         <option value="Naguabo">Naguabo</option>
                                         <option value="Naranjito">Naranjito</option>
                                         <option value="Orocovis">Orocovis</option>
                                         <option value="Patillas">Patillas</option>
                                         <option value="Penuelas">Penuelas</option>
                                         <option value="Ponce">Ponce</option>
                                         <option value="Quebradillas">Quebradillas</option>
                                         <option value="Rincon">Rincon</option>
                                         <option value="Rio Grande">Rio Grande</option>
                                         <option value="Sabana Grande">Sabana Grande</option>
                                         <option value="Salinas">Salinas</option>
                                         <option value="San German">San German</option>
                                         <option value="San Juan">San Juan</option>
                                         <option value="San Lorenzo">San Lorenzo</option>
                                         <option value="San Sebastian">San Sebastian</option>
                                         <option value="Santa Isabel">Santa Isabel</option>
                                         <option value="Toa Alta">Toa Alta</option>
                                         <option value="Toa Baja">Toa Baja</option>
                                         <option value="Trujillo Alto">Trujillo Alto</option>
                                         <option value="Utuado">Utuado</option>
                                         <option value="Vega Alta">Vega Alta</option>
                                         <option value="Vega Baja">Vega Baja</option>
                                         <option value="Vieques">Vieques</option>
                                         <option value="Villalba">Villalba</option>
                                         <option value="Yabucoa">Yabucoa</option>
                                         <option value="Yauco">Yauco</option>
                                     </select>






                                 </div>
                             </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input class="form-control" type="password" id="pass1" onKeyUp="passwordStrength(this.value)" name="user_password"  value="" autocomplete="off"/>
			 
		<div style="color:red; font-size:16px; font-weight:bold;" id="passwordDescription1"></div>
			<div  id="passwordStrength1" class="strength0"></div>
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
	<div id="ripon1" style="display:none;">
		 <form action="<?php echo base_url();?>index.php/welcome/new_user_registration_save" method="POST"  enctype="multipart/form-data"  autocomplete="off">
		
		<input type="hidden" value="Employeer" name="user_type" />
	
		
	 <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">First Name</label>
								<input  <?php if(isset($first_name)){echo "value=$first_name";}?> type="Text" class="form-control" id="ename" placeholder="Enter First Name" name="first_name"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Last Name</label>
								<input  <?php if(isset($last_name)){echo "value=$last_name";}?> type="Text" class="form-control"  placeholder="Enter Last Name" name="last_name"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">Email Address</label>
								<input  <?php if(isset($user_email)){echo "value=$user_email";}?> type="email" class="form-control" id="euser_email" placeholder="Enter Email" name="user_email"  value="" autocomplete="off">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  
							  
							
							  
							  <div class="col-md-12">
								<div class="form-group hide_">
								<label for="exampleInputEmail1">City</label>
								
									
										<select id="state" class="form-control" name="user_city">
                                            <option value="">Select State</option>
                                            <option value="Adjuntas">Adjuntas</option>
                                            <option value="Aguada">Aguada</option>
                                            <option value="Aguadilla">Aguadilla</option>
                                            <option value="Aguas Buenas">Aguas Buenas</option>
                                            <option value="Aibonito">Aibonito</option>
                                            <option value="Anasco">Anasco</option>
                                            <option value="Arecibo">Arecibo</option>
                                            <option value="Arroyo">Arroyo</option>
                                            <option value="Barceloneta">Barceloneta</option>
                                            <option value="Barranquitas">Barranquitas</option>
                                            <option value="Bayamon">Bayamon</option>
                                            <option value="Cabo Rojo">Cabo Rojo</option>
                                            <option value="Caguas">Caguas</option>
                                            <option value="Camuy">Camuy</option>
                                            <option value="Canovanas">Canovanas</option>
                                            <option value="Carolina">Carolina</option>
                                            <option value="Catano">Catano</option>
                                            <option value="Cayey">Cayey</option>
                                            <option value="Ceiba">Ceiba</option>
                                            <option value="Ciales">Ciales</option>
                                            <option value="Cidra">Cidra</option>
                                            <option value="Coamo">Coamo</option>
                                            <option value="Comerio">Comerio</option>
                                            <option value="Corozal">Corozal</option>
                                            <option value="Culebra">Culebra</option>
                                            <option value="Dorado">Dorado</option>
                                            <option value="Fajardo">Fajardo</option>
                                            <option value="Florida">Florida</option>
                                            <option value="Guanica">Guanica</option>
                                            <option value="Guayama">Guayama</option>
                                            <option value="Guayanilla">Guayanilla</option>
                                            <option value="Guaynabo">Guaynabo</option>
                                            <option value="Gurabo">Gurabo</option>
                                            <option value="Hatillo">Hatillo</option>
                                            <option value="Hormigueros">Hormigueros</option>
                                            <option value="Humacao">Humacao</option>
                                            <option value="Isabela">Isabela</option>
                                            <option value="Jayuya">Jayuya</option>
                                            <option value="Juana Diaz">Juana Diaz</option>
                                            <option value="Juncos">Juncos</option>
                                            <option value="Lajas">Lajas</option>
                                            <option value="Lares">Lares</option>
                                            <option value="Las Marias">Las Marias</option>
                                            <option value="Las Piedras">Las Piedras</option>
                                            <option value="Loiza">Loiza</option>
                                            <option value="Luquillo">Luquillo</option>
                                            <option value="Manati">Manati</option>
                                            <option value="Maricao">Maricao</option>
                                            <option value="Maunabo">Maunabo</option>
                                            <option value="Mayaguez">Mayaguez</option>
                                            <option value="Moca">Moca</option>
                                            <option value="Morovis">Morovis</option>
                                            <option value="Naguabo">Naguabo</option>
                                            <option value="Naranjito">Naranjito</option>
                                            <option value="Orocovis">Orocovis</option>
                                            <option value="Patillas">Patillas</option>
                                            <option value="Penuelas">Penuelas</option>
                                            <option value="Ponce">Ponce</option>
                                            <option value="Quebradillas">Quebradillas</option>
                                            <option value="Rincon">Rincon</option>
                                            <option value="Rio Grande">Rio Grande</option>
                                            <option value="Sabana Grande">Sabana Grande</option>
                                            <option value="Salinas">Salinas</option>
                                            <option value="San German">San German</option>
                                            <option value="San Juan">San Juan</option>
                                            <option value="San Lorenzo">San Lorenzo</option>
                                            <option value="San Sebastian">San Sebastian</option>
                                            <option value="Santa Isabel">Santa Isabel</option>
                                            <option value="Toa Alta">Toa Alta</option>
                                            <option value="Toa Baja">Toa Baja</option>
                                            <option value="Trujillo Alto">Trujillo Alto</option>
                                            <option value="Utuado">Utuado</option>
                                            <option value="Vega Alta">Vega Alta</option>
                                            <option value="Vega Baja">Vega Baja</option>
                                            <option value="Vieques">Vieques</option>
                                            <option value="Villalba">Villalba</option>
                                            <option value="Yabucoa">Yabucoa</option>
                                            <option value="Yauco">Yauco</option>
                                            </select>
											
											
											

									
									
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								
								
			<input class="form-control" type="password" name="user_password" id="pass" onKeyUp="passwordStrength(this.value)"  value="" autocomplete="off"/>
			 
		<div style="color:red; font-size:16px; font-weight:bold;" id="passwordDescription"></div>
			<div  id="passwordStrength" class="strength0"></div>
								
								
								
								


		
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
							 
							
						
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->
<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            if($(this).attr('id') == 'watch-me') {
                // alert();

                $('#ripon').show();
                $('#ripon1').hide();
            }
            else if($(this).attr('id') == 'watch-me2')
            {
                $('#ripon1').show();
                $('#ripon').hide();
            }
        });

    });
</script>
	<?php include('footer.php'); ?>