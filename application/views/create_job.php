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
                    	<h2>Manage Job</h2>
						
        <?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php }else{} ?>
						
                        <form  role="form" action="<?php echo base_url();?>index.php/user_panel/add_new_job" method="POST"  enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $user_details->id; ?>"/>
						<input type="hidden" name="user_type" value="<?php echo $user_details->user_type; ?>"/>
						<input type="hidden" name="user_email" value="<?php echo $user_details->user_email; ?>"/>
						<input type="hidden" name="user_name" value="<?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?>"/>
						
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Job title</label>
                            <input type="Text" class="form-control" id="name" placeholder="Job Title" name="job_title">
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          
                          
                          
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Job Description</label>
                            <textarea name="job_description" class="form-control" rows="3"></textarea>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
						  
						  <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="category" required class="form-control" onChange="showUser(this.value)">
															<option value="">--Select Category--</option>
															<?php foreach($get_all_categories as $get_category){ ?><option value="<?php echo $get_category->category_name; ?>"><?php echo $get_category->category_name; ?></option>
															<?php } ?>
														</select>
                          </div>
                          </div>
						  
						  <div class="clearfix"></div>
						  
						  
						  <div class="col-md-12">
                          	 <label for="exampleInputEmail1">Spcialization</label>
                          	<div id="txtHint"></div>
                          </div>
						   <div class="clearfix"></div>
						  
						   <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Location</label>
                            
							
							<select id="state" class="form-control" name="description">
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
						  
                          
                           <div class="col-md-6">
						   <div class="form-group">
						   	 <label for="exampleInputEmail1">Vacancy Type</label>
						   		  <div class="radio">
									  <label><input value="Freelancer" type="checkbox" name="vacancy_type[]"> Freelancer</label>
									  <label><input value="Local Business" type="checkbox" name="vacancy_type[]"> Local Business</label>
									</div>
									
								</div>
						   </div>
                           
						   
						   
						   <div class="col-md-6">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Budget</label>
                            <select class="form-control" name="budget">
								<option value="" >--select budget--</option>
								<option value="10$-50$">10$-50$</option>
							</select>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
						   
						   <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Experience</label>
                           <!-- <textarea name="experience" class="form-control" rows="3"></textarea>-->
							<select class="form-control" name="experience">
								<option value="" >--Select Experience--</option>
								<option value="0-1 year">0-1 Years</option>
								<option value="2-4 Years">2-4 Years</option>
								<option value="5-8 Years">5-8 Years</option>
								<option value="9+ Years">9+ Years</option>
							</select>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
						  
						  <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Qualification</label>
                            <!--<textarea name="qualification" class="form-control" rows="3"></textarea>-->
							<select class="form-control" name="qualification">
								<option value="" >--Select Qualification--</option>
								<option value="High School Diploma">High School Diploma</option>
								<option value="Certification">Certification</option>
								<option value="Associates Degree">Associates Degree</option>
								<option value="Bachelor's Degree">Bachelor's Degree</option>
								<option value="Bachelor's Degree">Master's Degree</option>
								<option value="Doctor's Degree">Doctor's Degree</option>
							</select>
							
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
						   
						   <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Attach File</label>
                            <input type="file" id="exampleInputFile" name="attached_file">
                                <p class="help-block">Upload Attached File.</p>
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
	
	<script>
 	function showUser(str) {
	//alert('hellow world');
	
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","<?php echo base_url(); ?>index.php/user_panel/get_spcialization?q="+str,true);
  xmlhttp.send();
}

 </script>

	<?php include('footer.php');?>