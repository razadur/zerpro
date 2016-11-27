<!--<pre>-->
<?php include('header.php');
//die(var_dump($get_freelancers));
?>

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Freelancer List</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="main-containt">
        <div class="container">
            <div class="row">
                <?php  include('freelancer_list_left.php');?>
                <main class="col-md-9 col-sm-9" id="frelancerList">

                    <?php foreach($get_freelancers as $get_freelancer){ ?>
                        <div class="col-md-4" style="width: 200px; height: 250px;  margin:30px; border: 1px solid #000000; ">
                            <div class="col-md-12">
                                <div class="col-md-12" style="padding: 10px; padding-top: 30px"> <img src="<?php echo base_url(); ?>images/users/<?php echo $get_freelancer->user_pic_one; ?>" width="120" height="120" /></div>
                                    <a class="candidate-name" href="<?php echo base_url(); ?>index.php/withoutLogin_jobList/frelancer_public_profile/<?php echo $get_freelancer->user_id; ?>" style="font-size: 15px"><?php echo $get_freelancer->name; ?></a><br>
                                <?php
                                $user_id = $get_freelancer->user_id;
                                $sql = "SELECT DISTINCT(manage_job.id), emp_free FROM manage_job
                                        JOIN job_feedback ON manage_job.id = job_feedback.job_id
                                        JOIN job_applications ON manage_job.id = job_applications.job_id
                                        WHERE status = 0
                                        AND freelancer_id = '$user_id'";
                                $query = $this->db->query($sql);
                                $result = $query->result();
                                $total_feedback = 0;
                                foreach($result as $row){
                                    $total_feedback = $total_feedback + $row->emp_free;
                                }
                                $num_of_completed_job = $query->num_rows();
                                if(!empty($num_of_completed_job)){
                                    $fBk = $average_feedback = intval($total_feedback / $num_of_completed_job);
                                }else{
                                    $fBk = '';
                                }
                                ?>
                                <i style="cursor: pointer; font-size: 25px" class="fa fa-star<?php echo $fBk>=1 ? '' : '-o';?>"></i>
                                <i style="cursor: pointer; font-size: 25px" class="fa fa-star<?php echo $fBk>=2 ? '' : '-o';?>"></i>
                                <i style="cursor: pointer; font-size: 25px" class="fa fa-star<?php echo $fBk>=3 ? '' : '-o';?>"></i>
                                <i style="cursor: pointer; font-size: 25px" class="fa fa-star<?php echo $fBk>=4 ? '' : '-o';?>"></i>
                                <i style="cursor: pointer; font-size: 25px" class="fa fa-star<?php echo $fBk>=5 ? '' : '-o';?>"></i>
                                <br><strong>Job Completed:</strong><?php echo  $num_of_completed_job;?>
                            </div>
                        </div>
                    <?php } ?>

                </main>
            </div>
        </div>
    </section><!-- /.main-containt -->

<?php include('footer.php');?>