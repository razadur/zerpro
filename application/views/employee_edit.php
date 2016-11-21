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
                    	<h2>Welcome <?php echo $user_details_info->name; ?></h2>
						<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php }else{} ?>
						
                        <form  role="form" action="<?php echo base_url();?>/index.php/user_panel/update_user_info" method="POST"  enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $user_details_info->user_id; ?>"/>
						<input type="hidden" name="user_type" value="<?php echo $user_details_info->user_type; ?>"/>
						<input type="hidden" name="user_email" value="<?php echo $user_details_info->user_email; ?>"/>
						
                          <div class="col-md-2">
                          	<div class="profile-pic">
                                <?php if(!empty($user_details_info->user_pic_one)){?>
                                    <img src="<?php echo base_url(); ?>images/users/<?php echo $user_details_info->user_pic_one; ?>" alt="Profile Picture" width="120" height="120">
                                    <input type="hidden" name="imagePresent" value="1">
                                <?php
                                }else{?>
                                <img src="http://placehold.it/120x120" alt="Profile Picture">
                                <?php }?>
                            </div>
                          </div>
                          <div class="col-md-10">
                          	<div class="form-group">
                               <input type="file" value="<?php echo $user_details_info->user_pic_one; ?>" id="exampleInputFile" name="user_pic_one" <?php if(empty($user_details_info->user_pic_one)) echo 'required';?>>
                                <p class="help-block">Example block-level help text here.</p>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          
                          <br/>
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="Text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $user_details_info->name; ?>">
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          
                          
                          
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">About</label>
                            <textarea value="<?php echo $user_details_info->description; ?>" name="description" class="form-control" rows="3"><?php echo $user_details_info->description; ?></textarea>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                           <div class="col-md-6">
                          	 <label for="exampleInputEmail1">Social Network</label>
                          	<div class="form-group">
                           		<input value="<?php echo $user_details_info->facebook_link; ?>" type="Text" class="form-control" id="name" placeholder="Enter Facebook"  name="facebook_link">
                         	</div>
                            <div class="form-group">
                           		<input value="<?php echo $user_details_info->twitter_link; ?>" type="Text" class="form-control" id="name" placeholder="Enter Twitter Link" name="twitter_link">
                         	</div>
                          </div>
                          <div class="col-md-6">
                          	<label for="exampleInputEmail1"></label>
                          	<div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Youtube Link" name="youtube_link" value="<?php echo $user_details_info->youtube_link; ?>">
                         	</div>
                            <div class="form-group">
                           		<input type="Text" class="form-control" id="name" placeholder="Enter Google Plus Link" name="google_plus_link" value="<?php echo $user_details_info->google_plus_link; ?>">
                         	</div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <div class="col-md-6">
                          	 <label for="exampleInputEmail1">Contact Information</label>
                          	<div class="form-group">
                            	<label for="exampleInputEmail1">Phone Number</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="phone_no" value="<?php echo $user_details_info->phone_no; ?>">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">Website</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="website" value="<?php echo $user_details_info->website; ?>">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">City</label>
                                <select class="form-control" id="name" name="city">
                                    <option value="">Select State</option>
                                    <option <?php if($user_details_info->city == 'Adjuntas' ) echo 'selected';?> value="Adjuntas">Adjuntas</option>
                                    <option <?php if($user_details_info->city == 'Aguada' ) echo 'selected';?> value="Aguada">Aguada</option>
                                    <option <?php if($user_details_info->city == 'Aguadilla' ) echo 'selected';?> value="Aguadilla">Aguadilla</option>
                                    <option <?php if($user_details_info->city == 'Aguas Buenas' ) echo 'selected';?> value="Aguas Buenas">Aguas Buenas</option>
                                    <option <?php if($user_details_info->city == 'Aibonito' ) echo 'selected';?> value="Aibonito">Aibonito</option>
                                    <option <?php if($user_details_info->city == 'Anasco' ) echo 'selected';?> value="Anasco">Anasco</option>
                                    <option <?php if($user_details_info->city == 'Arecibo' ) echo 'selected';?> value="Arecibo">Arecibo</option>
                                    <option <?php if($user_details_info->city == 'Arroyo' ) echo 'selected';?> value="Arroyo">Arroyo</option>
                                    <option <?php if($user_details_info->city == 'Barceloneta' ) echo 'selected';?> value="Barceloneta">Barceloneta</option>
                                    <option <?php if($user_details_info->city == 'Barranquitas' ) echo 'selected';?> value="Barranquitas">Barranquitas</option>
                                    <option <?php if($user_details_info->city == 'Bayamon' ) echo 'selected';?> value="Bayamon">Bayamon</option>
                                    <option <?php if($user_details_info->city == 'Cabo Rojo' ) echo 'selected';?> value="Cabo Rojo">Cabo Rojo</option>
                                    <option <?php if($user_details_info->city == 'Caguas' ) echo 'selected';?> value="Caguas">Caguas</option>
                                    <option <?php if($user_details_info->city == 'Camuy' ) echo 'selected';?> value="Camuy">Camuy</option>
                                    <option <?php if($user_details_info->city == 'Canovanas' ) echo 'selected';?> value="Canovanas">Canovanas</option>
                                    <option <?php if($user_details_info->city == 'Carolina' ) echo 'selected';?> value="Carolina">Carolina</option>
                                    <option <?php if($user_details_info->city == 'Catano' ) echo 'selected';?> value="Catano">Catano</option>
                                    <option <?php if($user_details_info->city == 'Cayey' ) echo 'selected';?> value="Cayey">Cayey</option>
                                    <option <?php if($user_details_info->city == 'Ceiba' ) echo 'selected';?> value="Ceiba">Ceiba</option>
                                    <option <?php if($user_details_info->city == 'Ciales' ) echo 'selected';?> value="Ciales">Ciales</option>
                                    <option <?php if($user_details_info->city == 'Cidra' ) echo 'selected';?> value="Cidra">Cidra</option>
                                    <option <?php if($user_details_info->city == 'Coamo' ) echo 'selected';?> value="Coamo">Coamo</option>
                                    <option <?php if($user_details_info->city == 'Comerio' ) echo 'selected';?> value="Comerio">Comerio</option>
                                    <option <?php if($user_details_info->city == 'Corozal' ) echo 'selected';?> value="Corozal">Corozal</option>
                                    <option <?php if($user_details_info->city == 'Culebra' ) echo 'selected';?> value="Culebra">Culebra</option>
                                    <option <?php if($user_details_info->city == 'Dorado' ) echo 'selected';?> value="Dorado">Dorado</option>
                                    <option <?php if($user_details_info->city == 'Fajardo' ) echo 'selected';?> value="Fajardo">Fajardo</option>
                                    <option <?php if($user_details_info->city == 'Florida' ) echo 'selected';?> value="Florida">Florida</option>
                                    <option <?php if($user_details_info->city == 'Guanica' ) echo 'selected';?> value="Guanica">Guanica</option>
                                    <option <?php if($user_details_info->city == 'Guayama' ) echo 'selected';?> value="Guayama">Guayama</option>
                                    <option <?php if($user_details_info->city == 'Guayanilla' ) echo 'selected';?> value="Guayanilla">Guayanilla</option>
                                    <option <?php if($user_details_info->city == 'Guaynabo' ) echo 'selected';?> value="Guaynabo">Guaynabo</option>
                                    <option <?php if($user_details_info->city == 'Gurabo' ) echo 'selected';?> value="Gurabo">Gurabo</option>
                                    <option <?php if($user_details_info->city == 'Hatillo' ) echo 'selected';?> value="Hatillo">Hatillo</option>
                                    <option <?php if($user_details_info->city == 'Hormigueros' ) echo 'selected';?> value="Hormigueros">Hormigueros</option>
                                    <option <?php if($user_details_info->city == 'Humacao' ) echo 'selected';?> value="Humacao">Humacao</option>
                                    <option <?php if($user_details_info->city == 'Isabela' ) echo 'selected';?> value="Isabela">Isabela</option>
                                    <option <?php if($user_details_info->city == 'Jayuya' ) echo 'selected';?> value="Jayuya">Jayuya</option>
                                    <option <?php if($user_details_info->city == 'Juana Diaz' ) echo 'selected';?> value="Juana Diaz">Juana Diaz</option>
                                    <option <?php if($user_details_info->city == 'Juncos' ) echo 'selected';?> value="Juncos">Juncos</option>
                                    <option <?php if($user_details_info->city == 'Lajas' ) echo 'selected';?> value="Lajas">Lajas</option>
                                    <option <?php if($user_details_info->city == 'Lares' ) echo 'selected';?> value="Lares">Lares</option>
                                    <option <?php if($user_details_info->city == 'Las Marias' ) echo 'selected';?> value="Las Marias">Las Marias</option>
                                    <option <?php if($user_details_info->city == 'Las Piedras' ) echo 'selected';?> value="Las Piedras">Las Piedras</option>
                                    <option <?php if($user_details_info->city == 'Loiza' ) echo 'selected';?> value="Loiza">Loiza</option>
                                    <option <?php if($user_details_info->city == 'Luquillo' ) echo 'selected';?> value="Luquillo">Luquillo</option>
                                    <option <?php if($user_details_info->city == 'Manati' ) echo 'selected';?> value="Manati">Manati</option>
                                    <option <?php if($user_details_info->city == 'Maricao' ) echo 'selected';?> value="Maricao">Maricao</option>
                                    <option <?php if($user_details_info->city == 'Maunabo' ) echo 'selected';?> value="Maunabo">Maunabo</option>
                                    <option <?php if($user_details_info->city == 'Mayaguez' ) echo 'selected';?> value="Mayaguez">Mayaguez</option>
                                    <option <?php if($user_details_info->city == 'Moca' ) echo 'selected';?> value="Moca">Moca</option>
                                    <option <?php if($user_details_info->city == 'Morovis' ) echo 'selected';?> value="Morovis">Morovis</option>
                                    <option <?php if($user_details_info->city == 'Naguabo' ) echo 'selected';?> value="Naguabo">Naguabo</option>
                                    <option <?php if($user_details_info->city == 'Naranjito' ) echo 'selected';?> value="Naranjito">Naranjito</option>
                                    <option <?php if($user_details_info->city == 'Orocovis' ) echo 'selected';?> value="Orocovis">Orocovis</option>
                                    <option <?php if($user_details_info->city == 'Patillas' ) echo 'selected';?> value="Patillas">Patillas</option>
                                    <option <?php if($user_details_info->city == 'Penuelas' ) echo 'selected';?> value="Penuelas">Penuelas</option>
                                    <option <?php if($user_details_info->city == 'Ponce' ) echo 'selected';?> value="Ponce">Ponce</option>
                                    <option <?php if($user_details_info->city == 'Quebradillas' ) echo 'selected';?> value="Quebradillas">Quebradillas</option>
                                    <option <?php if($user_details_info->city == 'Rincon' ) echo 'selected';?> value="Rincon">Rincon</option>
                                    <option <?php if($user_details_info->city == 'Rio Grande' ) echo 'selected';?> value="Rio Grande">Rio Grande</option>
                                    <option <?php if($user_details_info->city == 'Sabana Grande' ) echo 'selected';?> value="Sabana Grande">Sabana Grande</option>
                                    <option <?php if($user_details_info->city == 'Salinas' ) echo 'selected';?> value="Salinas">Salinas</option>
                                    <option <?php if($user_details_info->city == 'San German' ) echo 'selected';?> value="San German">San German</option>
                                    <option <?php if($user_details_info->city == 'San Juan' ) echo 'selected';?> value="San Juan">San Juan</option>
                                    <option <?php if($user_details_info->city == 'San Lorenzo' ) echo 'selected';?> value="San Lorenzo">San Lorenzo</option>
                                    <option <?php if($user_details_info->city == 'San Sebastian' ) echo 'selected';?> value="San Sebastian">San Sebastian</option>
                                    <option <?php if($user_details_info->city == 'Santa Isabel' ) echo 'selected';?> value="Santa Isabel">Santa Isabel</option>
                                    <option <?php if($user_details_info->city == 'Toa Alta' ) echo 'selected';?> value="Toa Alta">Toa Alta</option>
                                    <option <?php if($user_details_info->city == 'Toa Baja' ) echo 'selected';?> value="Toa Baja">Toa Baja</option>
                                    <option <?php if($user_details_info->city == 'Trujillo Alto' ) echo 'selected';?> value="Trujillo Alto">Trujillo Alto</option>
                                    <option <?php if($user_details_info->city == 'Utuado' ) echo 'selected';?> value="Utuado">Utuado</option>
                                    <option <?php if($user_details_info->city == 'Vega Alta' ) echo 'selected';?> value="Vega Alta">Vega Alta</option>
                                    <option <?php if($user_details_info->city == 'Vega Baja' ) echo 'selected';?> value="Vega Baja">Vega Baja</option>
                                    <option <?php if($user_details_info->city == 'Vieques' ) echo 'selected';?> value="Vieques">Vieques</option>
                                    <option <?php if($user_details_info->city == 'Villalba' ) echo 'selected';?> value="Villalba">Villalba</option>
                                    <option <?php if($user_details_info->city == 'Yabucoa' ) echo 'selected';?> value="Yabucoa">Yabucoa</option>
                                    <option <?php if($user_details_info->city == 'Yauco' ) echo 'selected';?> value="Yauco">Yauco</option>
                                </select>
                         	</div>
                          </div>
                          <div class="col-md-6">
                          	<label for="exampleInputEmail1"></label>
                          	<div class="form-group">
                            	<label for="exampleInputEmail1">Email Address</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="alt_email_address"  value="<?php echo $user_details_info->user_email; ?>" readonly>
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">Country</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="country" value="<?php if(!empty($user_details_info->country) )echo $user_details_info->country; else echo 'Puerto Rico' ?>"/>
                         	</div>
                            <div class="form-group">
                            	 <label for="exampleInputEmail1">Complete Address</label>
                           		<textarea value="<?php echo $user_details_info->complete_address; ?>" name="complete_address" class="form-control" rows="3"><?php echo $user_details_info->complete_address; ?></textarea>
                         	</div>
                          </div>
                          <div class="clearfix"></div>
                          
                          
                          
                          <div class="col-md-12">
						  <input value="Update" type="submit" class="submit_btn btn btn-default" name="update"/>
                          <!--<button type="submit" class="submit_btn btn btn-default">Submit</button>-->
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