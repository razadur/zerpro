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
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--                <h1>Job title Here</h1>-->
            </div>
        </div>
    </div>
</section>
<section class="main-containt">
<div class="container">
<div class="row">
<?php //include('left_menu.php');?>
<aside class="col-md-3 col-sm-3">
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/awaitingAcceptance">Awaiting Acceptance</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel/membership">Membership</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
</aside>

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
        <div style="padding-bottom:5px;"><b>User Type: <?php echo $this->session->userdata('user_type'); ?> </b></div><br>
        <div style="padding-bottom:5px;"><b>Location: </b><?php echo $user_details_info->city; ?></div><br>
        <div style="padding-bottom:5px;"><b>Phone: </b><?php echo $user_details_info->phone_no; ?></div><br>
        <div style="padding-bottom:5px;"><b>Email: </b> <?php echo $user_details_info->user_email; ?></div><br>
        <div style="padding-bottom:5px;"><b>Rating: </b>
            <?php
            $user_id = $user_details_info->user_id;
            $this->load->model('admin_panel_model');
            $star = $this->admin_panel_model->readStar($user_id);
            $fBk = intval($star[0]->star);?>
            <div>
                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=1 ? '' : '-o';?>"></i>
                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=2 ? '' : '-o';?>"></i>
                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=3 ? '' : '-o';?>"></i>
                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=4 ? '' : '-o';?>"></i>
                <i style="cursor: pointer" class="fa fa-2x fa-star<?php echo $fBk>=5 ? '' : '-o';?>"></i>
            </div>
        </div><br>
        <?php if(!empty($user_details_info->facebook_link)){?> <div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->facebook_link; ?>"> <span class="i i-facebook"></span> <img alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png"></a></b></div>
        <?php }if(!empty($user_details_info->twitter_link)){?> <div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->twitter_link; ?>"> <img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a></b></div>
        <?php }if(!empty($user_details_info->youtube_link)){?><div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->youtube_link; ?>"> <img alt="follow me on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png" border=0></a></b></div>
        <?php }if(!empty($user_details_info->website)){?><div style="padding-bottom:5px; float: left"><b><a href="<?php echo $user_details_info->website; ?>"> <img width="30" alt="follow my web" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYWbkNNcgD5MfDt6xhAur4wZvYRRGa50nWjSyAWEhT8tNF8Y72BA"></a></b></div>
        <?php }?>
    </div>

    <div class="col-md-3" style="text-align:center;">
        <label for="exampleInputEmail1"><a href="<?php echo base_url();?>index.php/user_panel/update_profile">Edit Profile</a></label>
        <?php if($packageInfo[0]->job_geting_package != 1){?>
            <label >
                <form name="frm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <div style="">
                        <input type="hidden" name="cmd" value="_xclick" />
                        <input type="hidden" name="business" value="patrickmotors-facilitator@yahoo.com" />
                        <input type="hidden" name="amount" value="10" />
                        <input type="hidden" name="no_shipping" value="1" />
                        <input type="hidden" name="no_note" value="1" />
                        <input type="hidden" name="currency_code" value="USD" />
                        <input type="hidden" name="lc" value="USD" />
                        <input type="hidden" name="item_name" value="Registration" />
                        <input type="hidden" name="bn" value="PP-BuyNowBF" />
                        <input type="hidden" name="return" value="<?php echo base_url();?>index.php/user_panel/package_update" />
                        <input type="hidden" name="rm" value="2" />
                        <input type="submit"  border="0" name="submit" value="Package Update" alt="Make payments with PayPal - it's fast, free and secure!" class="additional_height button"  class="btn btn-borderd" title="Make payments with PayPal - it's fast, free and secure!" />
                        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                    </div>
                </form>
                <!--                                <a href="--><?php //echo base_url();?><!--index.php/user_panel/package_update"> Package Update</a>-->
            </label>
        <?php }?>
        </br/>

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
            <?php echo $user_details_info->description?>
        </p>
    </div>
    <div class="col-md-3" style="text-align:center">
        <span style="font-weight:bold; font-size:20px;">Spcilization</span>
        <br/>
        <?php $spcialization = explode(',',$user_details_info->spcialization);?>
        <ul>
            <?php for($i=0;$i<count($spcialization);$i++){
                echo '<li>'.$spcialization[$i].'</li>';
            }

           ?>
        </ul>
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