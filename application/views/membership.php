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
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/user_panel">Profile</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/message">Message</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/notification">Notification</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/onGoingJob">On Going Jobs</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/job_list/awaitingAcceptance">Awaiting Acceptance</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle active" href="<?php echo base_url();?>index.php/user_panel/membership">Membership</a>
    <a style="width:100%; text-align:left" class="btn btn-primary dropdown-toggle" href="<?php echo base_url();?>index.php/login/logout">Logout</a>
</aside>
<main class="col-md-9 col-sm-9">
    <div class="candidate_panel">
<!--        <pre>-->
        <?php
        //print_r($package_info);
        if(empty($package_info[0]->job_geting_package)){?>
            <h2>Your are Subscribed for Monthly package.</h2>
            <div style="padding:5px 20px ;"><b>Subscribed date: </b><?php echo date('m-d-Y',strtotime($package_info[0]->create_date)) ?></div>
            <div style="padding:5px 20px ;"><b>Package Start Date: </b><?php echo date('m-d-Y',strtotime($package_info[0]->start_date)); ?></div>
            <div style="padding:5px 20px ;"><b>Package End Date: </b><?php echo date('m-d-Y',strtotime($package_info[0]->end_date)); ?></div>
        <?php }else{
            $userid = $this->session->userdata('userid');
            $this->db->select('max(entry_date) entry_date');
            $this->db->from('pay_amount');
            $this->db->where('user_id',$userid);
            $query_result=$this->db->get();
            $result=$query_result->result();

            ?>
            <h2>Your are Subscribed for Per job package.</h2>
            <div style="padding:5px 20px ;"><b>Subscribed date: </b><?php echo date('m-d-Y',strtotime($package_info[0]->create_date)) ?></div>
            <div style="padding:5px 20px ;"><b>Last job payment Date: </b><?php
                if(!empty($result[0]->entry_date)){
                echo date('m-d-Y',strtotime($result[0]->entry_date));
                }else echo 'NaN';?></div>
        <?php }?>


        <div class="col-md-12">
            <label><a href="<?php echo base_url();?>index.php/user_panel/delete_profile">Delete Profile</a></label>
        </div>
        <div class="clearfix"></div>
    </div>
</main>
</div>
</div>
</section><!-- /.main-containt -->

<?php include('footer.php');?>