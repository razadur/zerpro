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
            <main class="col-md-12 col-sm-12">
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
                        <div style="padding-bottom:5px;"><b>User Type: <?php echo $user_details_info->user_type; ?> </b></div>
                        <div style="padding-bottom:5px;"><b>Location: </b><?php echo $user_details_info->city; ?></div>
                        <div style="padding-bottom:5px;"><b>Phone: </b><?php echo $user_details_info->phone_no; ?></div>
                        <div style="padding-bottom:5px;"><b>Email: </b> <?php echo $user_details->user_email; ?></div>
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
                        </div>
                    </div>
                    <div class="col-md-3" style="text-align:center;">
                        <?php $userid = $user_details_info->user_id;
                        if(!empty($userid)){?>
                            <label><a data-toggle="modal" data-target="#myModal_<?php echo $userid; ?>">Contact</a></label>
                        <?php }else echo '<label>&nbsp;</label>';?>
                    </div>


                    <div class="col-md-3" style="text-align:center;">
                        <label>&nbsp;</label>
                    </div>





                    <div class="col-md-3">
                        <br/>
                        <span style=" padding-left:15%;font-weight:bold; font-size:30px; text-align:center">0</span><br/>
                        <span style="font-weight:bold; font-size:17px; text-align:center">Open Jobs</span>
                    </div>

                    <div class="col-md-3" style="text-align:center;">
                        <br/>
                        <span style="font-weight:bold; font-size:30px; text-align:center"><?php echo $star[0]->job_done ?></span><br/>
                        <span style="font-weight:bold; font-size:17px; text-align:center">Jobs Completed</span>
                    </div>

                    <div class="clearfix"></div>
                    <hr/>
                    <div class="col-md-12">
                        <span style="font-weight:bold; font-size:20px;">About</span>
                        <br/>
                        <p>


                        </p>
                    </div>

                    <div class="clearfix"></div>

                    <hr/>


                    <div class="col-md-12">
                        <span style="font-weight:bold; font-size:20px;">Others Job From</span>
                        <br/>
                        <p>


                        </p>
                    </div>

                    <div class="clearfix"></div>

                    <hr/>



                    <div class="col-md-12">
                        <span style="font-weight:bold; font-size:20px;">Rating & Review</span>
                        <br/>
                        <p>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <hr/>
                    <br/>







                </div>
                <br/>
            </main>

    </div>
    </div>
</section><!-- /.main-containt -->
<div class="container">
    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div class="modal fade" id="myModal_<?php echo $userid;?>" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Send Message</h4>
                </div>
                <div class="modal-body">
                    <?php  $get_last_subject_id = $this->admin_panel_model->get_last_subject_id(); ?>
                    <form role="form" action="<?php echo base_url();?>index.php/user_panel/message_send" method="POST"  enctype="multipart/form-data">
                        <input type="text" name="subject" style="width:100%" placeholder="Subject"/><br/>

                        <textarea name="message" style="width:100%"></textarea>
                        <input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('userid') ?>" />
                        <input type="hidden" name="freelancer_id" value="<?php echo $user_details_info->user_id; ?>" />
                        <input type="hidden" name="sender_by" value="<?php echo $this->session->userdata('userid') ?>"/>
                        <input class="btn btn-primary btn-block" type="submit" value="Send" name="submit" />
                    </form>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>
</div>
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