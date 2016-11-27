<!--<pre>
--><?php
/*print_r($user_details_info);die;
*/?>
<?php include('header.php');?>
	
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
				<?php include('left_menu.php');?>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
                    	<h2>Welcome <?php echo $user_details_info->name; ?></h2>
						<?php if ($this->session->flashdata('flasherror')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
    <?php }else{} ?>
                        <form role="form" action="<?php echo base_url();?>/index.php/user_panel/update_user_info" method="POST"  enctype="multipart/form-data">
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

                                <div class="profile-pic">
                                    <?php if(!empty($user_details_info->user_pic_one)){?>
                                        <input type="file" value="<?php echo $user_details_info->user_pic_one; ?>" id="exampleInputFile" name="user_pic_one" <?php if(empty($user_details_info->user_pic_one)) echo 'required';?>>
                                        <input type="hidden" name="imagePresent" value="1">
                                    <?php
                                    }else{?>
                                        <input type="file" id="exampleInputFile" name="user_pic_one" <?php if(empty($user_details_info->user_pic_one)) echo 'required';?>>
                                    <?php }?>
                                </div>
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
                          
                          <div class="col-md-6">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Expeted salary/Rate</label>
                            <input type="Text" class="form-control" id="name" placeholder="Expeted salary/Rate" name="expeted_salary" value="<?php echo $user_details_info->expeted_salary; ?>">
                          </div>
                          </div>
                          <div class="col-md-6">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                           <!-- <input value="<?php //echo $user_details_info->category; ?>" name="category" type="Text" class="form-control" id="name" placeholder="Category">-->
							<select name="category" required class="form-control" onChange="showUser(this.value)">
							
							<?php if($user_details_info->category)
							{ ?>
							<option value="<?php echo $user_details_info->spcialization; ?>"><?php echo $user_details_info->category; ?>(<?php echo $user_details_info->spcialization; ?>)</option>
							<?php }else{ ?>
                                    <option value="">--Select Category--</option>
                                    <?php } ?>
                                    <?php foreach($get_all_categories as $get_category){ ?><option value="<?php echo $get_category->category_name; ?>"><?php echo $get_category->category_name; ?></option>
                                    <?php } ?>
                                </select>
							
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <div class="col-md-4">
                          	 <label for="exampleInputEmail1">Spcialization</label>
							 
							 <div id="txtHint"></div>
                          	
                          	
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <div class="col-md-12">
                          	<div class="form-group">
                            <label for="exampleInputEmail1">About </label>
                            <textarea value="<?php echo $user_details_info->description; ?>" name="description" class="form-control" rows="3"><?php echo $user_details_info->description; ?></textarea>
                          </div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          <div class="col-md-6">
                          	 <label for="exampleInputEmail1">Social Network (Optional)</label>
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
                          	 <label for="exampleInputEmail1">Contact Information (Optional)</label>
                          	<div class="form-group">
                            	<label for="exampleInputEmail1">Phone Number</label>
                           		<input type="Text" class="form-control" id="name" placeholder="" name="phone_no" value="<?php echo $user_details_info->phone_no; ?>">
                         	</div>
                            <div class="form-group">
                            	<label for="exampleInputEmail1">Website (Optional)</label>
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
                            	 <label for="exampleInputEmail1">Complete Address (Optional)</label>
                           		<textarea value="<?php echo $user_details_info->complete_address; ?>" name="complete_address" class="form-control" rows="3"><?php echo $user_details_info->complete_address; ?></textarea>
                         	</div>
                          </div>
                          
                          <div class="clearfix"></div>
                          
                          
                          <div class="col-md-12">
                          	 <label >Experience (Optional)<a  style="padding-left: 20px" onclick="jobAddMore()">Add More</a></label>
                              <input type="hidden" value="0" id="jobCounter" name="jobCounter">
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Position</label>
                                    <input type="Text" class="form-control" id="job_position0" placeholder="" name="job_position0">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label >Company Category</label>
                                    <select class="form-control" name="company_type0" id="company_type0">
                                      <option  value="1">1</option>
                                      <option  value="2">2</option>
                                      <option  value="3">3</option>
                                      <option  value="4">4</option>
                                      <option  value="5">5</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label></label>
                                <div class="form-group">
                                    <label >Company name</label>
                                    <input type="Text" class="form-control" id="company_name0" placeholder="" name="company_name0" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1"></label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Job details</label>
                                    <textarea name="job_details0" id="job_details0" class="form-control"></textarea>
                                </div>
                              </div>
                          </div>
                        <div id="job_add_more">
                        </div>
                        <?php $i=0;
                        $user_id = $user_details_info->user_id;
                        $this->db->select('*');
                        $this->db->from('user_job_info');
                        $this->db->where('user_id',$user_id);
                        $query_result= $this->db->get();
                        $result=$query_result->result();
                        $num_rows=$query_result->num_rows();
                        if($num_rows != 0){
                            foreach($result as $row){
                                if($i==0){?>
                                    <div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Job Position</label>
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Company Category</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Company name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Job details</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Option</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="job_added<?php echo $i;?>">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <?php echo $row->job_position?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <?php echo $row->company_type?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <?php echo $row->company_name?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php echo $row->job_details?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><a onclick="jobAddedCancle(<?php echo $i;?>)">Delete</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{?>
                                    <div id="edu_added<?php echo $i;?>">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->degree_name?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->year?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->institue_name?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><a onclick="jobAddedCancle(<?php echo $i;?>)">Delete</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } $i++;}
                        }?>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <label>Education (Optional)<a onclick="eduAddMore()" style="padding-left: 20px"> Add More</a></label>
                            <input type="hidden" value="0" id="eduCounter" name="eduCounter">
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="degree_name0">Degree</label>
                                    <select class="form-control" name="degree_name0" id="degree_name0">
                                        <option value="">No Degree</option>
                                        <option value="High School Diploma">High School Diploma</option>
                                        <option value="Technical Certificate">Technical Certificate</option>
                                        <option value="Associates Degree">Associates Degree</option>
                                        <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                                        <option value="Master’s Degree">Master’s Degree</option>
                                        <option value="Doctor’s Degree">Doctor’s Degree</option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="year0">Year</label>
                                      <input type="number" class="form-control" id="year0" placeholder="Year" name="year0">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="institue_name0">Institute Name</label>
                                    <input type="Text" class="form-control" id="institue_name0" placeholder="Institute Name" name="institue_name0">
                                </div>
                              </div>
                        </div>
                          <div id="edu_add_more">
                          </div>


                        <?php $i=0;
                        $user_id = $user_details_info->user_id;
                        $this->db->select('*');
                        $this->db->from('user_edu_info');
                        $this->db->where('user_id',$user_id);
                        $query_result= $this->db->get();
                        $result=$query_result->result();
                        $num_rows=$query_result->num_rows();
                        if($num_rows != 0){
                            foreach($result as $row){
                                if($i==0){?>
                                    <div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Year</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Institute Name</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Option</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edu_added<?php echo $i;?>">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->degree_name?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->year?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->institue_name?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><a onclick="eduAddedCancle(<?php echo $i;?>)">Delete</a></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{?>
                                    <div id="edu_added<?php echo $i;?>">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->degree_name?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->year?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php echo $row->institue_name?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><a onclick="eduAddedCancle(<?php echo $i;?>)">Delete</a></label>
                                            </div>
                                        </div>
                                    </div>
                            <?php } $i++;}
                            }?>


                          <div class="clearfix"></div>
                          <div class="col-md-12">
						  <input value="Update" type="submit" class="submit_btn btn btn-default" name="update"/>
                          <!--<button type="submit" class="submit_btn btn btn-default" name="update">Update</button>-->
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

    function eduAddMore(){
        var count = parseInt($('#eduCounter').val());
        var degree_name = $('#degree_name0').val();
        var year = $('#year0').val();
        var institute_name = $('#institue_name0').val();
        var count = count+1
        if(degree_name == ''){
            alert('Degree cannot be empty.');
        }else if(year == ''){
            alert('year cannot be empty.');
        }else if(institute_name == ''){
            alert('Institute Name cannot be empty.');
        }else{
            var html =  '<div id="addEdu'+count+'" class="col-md-6">' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label for="degree_name'+count+'">Degree</label>' +
                                    '<input type="Text" value="'+degree_name+'" class="form-control" name="degree_name'+count+'" id="degree_name'+count+'" readonly>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label for="year'+count+'">Year</label>' +
                                    '<input type="Text" value="'+year+'" class="form-control" id="year'+count+'" placeholder="Year" name="year'+count+'" readonly>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                    '<div class="form-group">' +
                                        '<label for="institue_name'+count+'">Institute Name</label>' +
                                        '<input type="Text" value="'+institute_name+'" class="form-control" id="institue_name'+count+'" placeholder="Institute Name" name="institue_name'+count+'" readonly>' +
                                    '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                    '<div class="form-group">' +
                                        '<br>' +
                                        '<a onclick="eduCancle('+count+')" class = "btn btn-default">Cancle</a>'+
                                    '</div>' +
                            '</div>' +
                        '</div>';
            $('#edu_add_more').append(html);
            $('#eduCounter').val(count);
            $("#degree_name0").val("").change();
            $('#year0').val("");
            $('#institue_name0').val("");
        }
    }
    function eduCancle(n) {
        $('#addEdu'+n).remove();
    }
    function jobAddMore(){
        var count = parseInt($('#jobCounter').val());
        var job_position = $('#job_position0').val();
        var company_type = $('#company_type0').val();
        var company_name = $('#company_name0').val();
        var job_details = $('#job_details0').val();
        var count = count+1
        if(job_position == ''){
            alert('Job position cannot be empty.');
        }else if(company_type == ''){
            alert('Company type cannot be empty.');
        }else if(company_name == ''){
            alert('Company Name cannot be empty.');
        }else if(job_details == ''){
            alert('Job details cannot be empty.');
        }else{
            var html =  '<div class="col-md-6" id="addJob'+count+'">' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label>Job Position</label>' +
                                    '<input type="Text" value="'+job_position+'" class="form-control" id="job_position'+count+'" placeholder="" name="job_position'+count+'" readonly>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<label >Company Category</label>' +
                                    '<input type="Text" value="'+company_type+'" class="form-control" id="company_type'+count+'" placeholder="" name="company_type'+count+'" readonly>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<label></label>' +
                                '<div class="form-group">' +
                                    '<label >Company name</label>' +
                                    '<input type="Text" value="'+company_name+'" class="form-control" id="company_name'+count+'" placeholder="" name="company_name'+count+'" readonly>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<label></label>' +
                                '<div class="form-group">' +
                                    '<label>Job details</label>' +
                                    '<textarea  class="form-control" name="job_details'+count+'" id="job_details'+count+'" readonly>'+job_details+'</textarea>' +
                                '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<div class="form-group">' +
                                    '<br>' +
                                    '<a onclick="jobCancle('+count+')" class = "btn btn-default">Cancle</a>'+
                                '</div>' +
                            '</div>' +
                        '</div>';
            $('#job_add_more').append(html);
            $('#jobCounter').val(count);
            $('#job_position0').val("");
            $("#company_type0").val("").change();
            $('#company_name0').val("");
            $('#job_details0').val("");
        }
    }
    function jobCancle(n){
        $('#addJob'+n).remove();
    }
    function eduAddedCancle(n){
        $('#edu_added'+n).remove();
    }
    function jobAddedCancle(n){
        $('#job_added'+n).remove();
    }
 </script>
<?php include('footer.php');?>