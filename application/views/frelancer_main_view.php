<?php include('header.php');?>
	<style>
        img.thumbnail{ height: 160px; /*margin: 10px;*/ }


        .close_ {
            position: absolute;
            padding:2px 6px;
            top: 10px;
            left: 25px;
            background:#ccc;
            cursor: pointer;
        }
        .close_:hover {
            position: absolute;
            padding:2px 6px;
            top: 10px;
            left: 25px;
            background:#ccc;
            color:#fff;
            cursor: pointer;
        }
    </style>
	<section class="main-containt">
		<div class="container">
			<div class="row">
				<?php include('left_menu.php');?>
                <main class="col-md-9 col-sm-9">
                 	<div class="candidate_panel">
					<br/>
						<div class="col-md-3">
                            <?php if(!empty($user_details_info->user_pic_one)) { $user_details_info->user_pic_one; ?>
                                <img src="<?php echo base_url(); ?>images/users/<?php echo $user_details_info->user_pic_one; ?>" alt="Profile Picture" width="180" height="180">
                            <?php }else{?>
                                <img src="http://placehold.it/180x180" alt="Profile Picture">
                            <?php }?>
						</div>
						<div class="col-md-3">
							<span style="font-weight:bold; font-size:20px;"><?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></span>
							<br/><br/>
							<div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div>
							<div style="padding-bottom:5px;"><b>Location: </b><?php echo $user_details_info->city; ?></div>
							<div style="padding-bottom:5px;"><b>Phone: </b><?php echo $user_details_info->phone_no; ?></div>
							<div style="padding-bottom:5px;"><b>Email: </b> <?php echo $user_details->user_email; ?></div>
						</div>
						
						<div class="col-md-3" style="text-align:center;">
						<label for="exampleInputEmail1"><a href="<?php echo base_url();?>index.php/user_panel/update_profile">Edit Profile</a></label>
						<br/>
							
							<span style="font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Opens Jobs</span>
						</div>
						<div class="col-md-3" style="text-align:center;">
							<br/>
							<span style="font-weight:bold; font-size:30px; text-align:center">0</span><br/>
							<span style="font-weight:bold; font-size:17px; text-align:center">Jobs Completed</span>
						</div>
						
						<div class="clearfix"></div>
						<hr/>
						<div class="col-md-9">
							<span style="font-weight:bold; font-size:20px;">About</span>
							<br/>
							<p>
							
								
							</p>
						</div>
						<div class="col-md-3" style="text-align:center">
							<span style="font-weight:bold; font-size:20px;">Spcilization</span>
							<br/>
							
						</div>
						<div class="clearfix"></div>
						<hr/>
						<div class="col-md-12">
                            <form id="imgUp" method="post" enctype="multipart/form-data">
							<span style="font-weight:bold; font-size:20px;">Protfolio &nbsp;&nbsp; <a id="editProtfolio" class="btn btn-borderd">Edit</a><button id="doneProtfolio" type="submit" class="btn btn-borderd" style="display: none">Done</button></span>
							<br/>
							<div class="row">
                                <br>
                                <output id="result">
                                    <?php
                                    foreach($uploadedImage as $row){
                                    ?>
                                        <div class="col-md-3" id="imgBlock_<?php echo $row->id;?>">
                                            <span class='close_' onclick='deleteImage("<?php echo $row->id;?>")' style="display: none">x</span>
<!--                                            <button id="closeButton">close</button>-->
                                            <img class='thumbnail' src="<?php echo base_url().'uploads/'.$row->file_name;?>" >
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </output>
                                <div class="col-md-3">
                                    <img class='thumbnail' id="baseImage" src="<?php echo base_url('images/image.jpg')?>" style="display: none">
                                    <input type="file" id="files0" name='upload[]' style="display: none"/>

                                </div>
                                <input type="text" value="0" id="count" name="count" hidden>
                                </form>
                            </div>

						</div>
						<div class="clearfix"></div>
						<br/>
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Experience</span>
							<br/>
							<!--<span style="font-weight:bold; font-size:16px;">Job Position: </span> <?php /*echo $user_details_info->job_position; */?>
							<br/>
							<div style="padding-bottom:5px;"><b>Company Name: </b> <?php /*echo $user_details_info->company_name; */?></div>
							<div style="padding-bottom:5px;"><b>Comapy Type: </b> <?php /*echo $user_details_info->company_type; */?></div>
							<p>
                                <?php /*echo $user_details_info->job_details; */?>
							</p>-->
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Job Position</label>
                                                        <label></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Company Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Company name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Job details</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="job_added<?php echo $i;?>">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo $row->job_position?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo $row->company_type?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo $row->company_name?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo $row->job_details?>
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->job_details?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } $i++;}
                            }?>
						</div>
						<div class="clearfix"></div>
						
						<hr/>
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Education</span>
							<br/><br/>
							<!--<span style="font-weight:bold; font-size:14px;">Degree: </span><?php /*echo $user_details_info->degree_name; */?>
							<br/>
							<span style="font-weight:bold; font-size:12px;">Year: </span>--><?php /*echo $user_details_info->year; */?>

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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Degree</label>
                                                        <label></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Year</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Institute Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="edu_added<?php echo $i;?>">
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->degree_name?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->year?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->institue_name?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }else{?>
                                        <div id="edu_added<?php echo $i;?>">
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->degree_name?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->year?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php echo $row->institue_name?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } $i++;}
                            }?>
						<br/><br/>
						</div>
						<div class="clearfix"></div>
                        <div class="col-md-12">
                            <label><a href="<?php echo base_url();?>index.php/user_panel/delete_profile">Delete Profile</a></label>
                        </div>
                        <div class="clearfix"></div>
                        <br/><br/>
                    </div>
					<br/>
                </main>
				
			</div>
		</div>
	</section><!-- /.main-containt -->

	<?php include('footer.php');?>

<script>
    function fun(f){
        var filesInput = document.getElementById(f);

        filesInput.addEventListener("change", function(event){

            var files = event.target.files; //FileList object
            var output = document.getElementById("result");

            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];

                //Only pics
                if(!file.type.match('image'))
                    continue;

                var picReader = new FileReader();

                picReader.addEventListener("load",function(event){

                    var picFile = event.target;

                    var div = document.createElement("div");





                    div.style.float="left";
                    var count = parseInt($('#count').val()) + 1 ;
                    $('#count').val(count);




                    div.innerHTML = "<div class='col-md-3' id='newImage"+count+"'>" +
                        "<span class='close_' onclick='deleteNewImage("+count+")'>x</span>" +
                        "<img class='thumbnail' src='" + picFile.result + "' title='" + picFile.name + "'/></div>" +
                        '<input type="file" id="files'+count+'" name="upload[]" style="display: none" />';
                    output.insertBefore(div,null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        });
    }

    $("#baseImage").click(function(){
        var count = $('#count').val();
        var files = 'files'+count;
        $('#'+files).click();
        fun(files);
    });

    $('#editProtfolio').click(function(){
        $('#editProtfolio').hide();
        $('#doneProtfolio').show();
        $('#baseImage').show();
        $('.close_').show();
    });

    $('#doneProtfolio').click(function(){
        $('#doneProtfolio').hide();
        $('#editProtfolio').show();
        $('#baseImage').hide();
        $('.close_').hide();
    });

    $('#imgUp').on('submit',function(e){
        var count = $('#count').val();
        if(count>0){
            $.ajax({
                url:'<?php echo base_url();?>index.php/user_panel/update_image',
                data: new FormData(this),
                type:'POST',
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){
                    //alert(data);
                }
            });
        }
        e.preventDefault();
    });

    function deleteImage(id){
        var data = 'id='+id;
        $.ajax({
            url:'<?php echo base_url();?>index.php/user_panel/delete_image',
            data: data,
            type:'POST',
            success:function(data){
                $('#imgBlock_'+id).hide();
            }
        });
    }
    function deleteNewImage(id){
        $("#newImage"+id).remove();
        $("#files"+id).remove();
    }
</script>