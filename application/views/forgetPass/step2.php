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
                        <h2>Forget Password</h2>
                        <?php if ($this->session->flashdata('flasherror')) { ?>
                            <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
                        <?php }else{} ?>

                        <form action="<?php echo base_url();?>index.php/welcome/passRecover" method="POST"  enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="hidden" class="form-control" name="user_email" value="<?php echo $email?>">
                                    <input type="password" class="form-control" id="pass" placeholder="New Password" name="user_pass1" value="">
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="pass" placeholder="Confirm password" name="user_pass2" value="">
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <button type="submit" class="submit_btn btn btn-default" name="submit">Next</button>
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