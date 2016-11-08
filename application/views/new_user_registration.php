<?php include('header.php'); ?>

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
						 	<div class="form-group">
								 <label for="exampleInputEmail1">User Type</label><br/>
								 
								 <label class="radio-inline">
								 <input checked="checked" type="radio" name="user_type" id='watch-me' value="Frelancer">Frelancer
								   </label>
								   <label class="radio-inline">
								   <input type="radio" name="user_type" id='watch-me2' value="Employeer"> Employeer
	
								 
								</label>
								  
								
								
								  
								</label>
								
							</div>
						 </div>
						 
						 <div class="clearfix"></div>
						 
						 
						 
						 <div id="ripon">
						 <form action="<?php echo base_url();?>index.php/welcome/new_user_registration_save" method="POST"  enctype="multipart/form-data">
							<input type="hidden" value="Frelancer" name="user_type" />
								 <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">First Name</label>
								<input type="Text" class="form-control" id="name" placeholder="Enter First Name" name="first_name">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Last Name</label>
								<input type="Text" class="form-control" id="name" placeholder="Enter Last Name" name="last_name">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Email Address</label>
								<input type="email" class="form-control" id="name" placeholder="Enter Email" name="user_email">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  
							  
							  <div class="clearfix"></div>
							  
							  
							  
							  
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Telephone</label>
								<input type="text" class="form-control" id="name" placeholder="Enter Tel" name="user_tel">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Address</label>
								<textarea class="form-control" name="user_address"></textarea>
								
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input class="form-control" type="password" name="user_password" id="pass1" onKeyUp="passwordStrength(this.value)" name="user_password"/>
			 
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
		 <form action="<?php echo base_url();?>index.php/welcome/new_user_registration_save" method="POST"  enctype="multipart/form-data">
		
		<input type="hidden" value="Employeer" name="user_type" />
	
		
	 <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">First Name</label>
								<input type="Text" class="form-control" id="name" placeholder="Enter First Name" name="first_name">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Last Name</label>
								<input type="Text" class="form-control" id="name" placeholder="Enter Last Name" name="last_name">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  <div class="col-md-12">
								<div class="form-group">
								<label for="exampleInputEmail1">Email Address</label>
								<input type="email" class="form-control" id="name" placeholder="Enter Email" name="user_email">
							  </div>
							  </div>
							  
							  <div class="clearfix"></div>
							  
							  
							  
							
							  
							  <div class="col-md-12">
								<div class="form-group">
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
								
								
			<input class="form-control" type="password" name="user_password" id="pass" onKeyUp="passwordStrength(this.value)" name="user_password"/>
			 
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

	<?php include('footer.php'); ?>