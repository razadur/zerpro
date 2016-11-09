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
							<img src="http://placehold.it/180x180" alt="Profile Picture">
						</div>
						<div class="col-md-3">
							<span style="font-weight:bold; font-size:20px;"><?php echo $user_details->first_name; ?> <?php echo $user_details->last_name; ?></span>
							<br/><br/>
							<div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div>
							<div style="padding-bottom:5px;"><b>Location: </b></div>
							<div style="padding-bottom:5px;"><b>Phone: </b></div>
							<div style="padding-bottom:5px;"><b>Email:<?php echo $user_details->user_email; ?> </b> </div>
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
							<span style="font-weight:bold; font-size:16px;">Job Position</span>
							<br/>
							<div style="padding-bottom:5px;"><b>Company Name: </b> </div>
							<div style="padding-bottom:5px;"><b>Comapy Type: </b></div>
							<p>
								
							</p>
							
							
					
							<br/>
							<span style="font-weight:bold; font-size:16px;">Job Position</span>
							<br/>
							<div style="padding-bottom:5px;"><b>Company Name: </b> </div>
							<div style="padding-bottom:5px;"><b>Comapy Type: </b></div>
							<p>
								
								
							</p>
							
							
						</div>
						<div class="clearfix"></div>
						
						<hr/>
						
						<div class="col-md-12">
							<span style="font-weight:bold; font-size:20px;">Education</span>
							<br/><br/>
							<span style="font-weight:bold; font-size:14px;"></span>
							<br/>
							<span style="font-weight:bold; font-size:12px;"></span>
						
						<br/><br/>
							
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