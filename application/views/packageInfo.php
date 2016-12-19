<?php include('header.php');?>

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Package Info</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="main-containt">
        <div class="container">
            <div class="row">
                <?php include('left_menu.php');?>
                <main class="col-md-9 col-sm-9">
                    <div class="candidate_panel cust">
                        <h2>Welcome <?php echo $user_details_info->name; ?></h2>
                        <?php if ($this->session->flashdata('flasherror')) { ?>
                            <div class="alert alert-success"> <?= $this->session->flashdata('flasherror') ?> </div>
                        <?php }else{} ?>
                        <div class="row">
                            <h2 class="plan-head">choose your plan</h2>
                            <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                                <div class="pricewrapper">
                                    <h3>free plan</h3>
                                    <P> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid illum sed tempora reiciendis modi totam</P>
                                    <P class="price">$00</P>
                                    <ul>
                                        <li>free for 30 days</li>
                                        <li>choose your plan</li>
                                        <li class="highlight">plan b for you</li>
                                        <li>plan b</li>
                                        <li>plan b</li>
                                        <li>This for plan b</li>
                                        <li>Choose plan b</li>
                                    </ul>
                                    <a class="btn btn-select"href="<?php echo base_url();?>/index.php/user_panel/package/1">select</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="pricewrapper">
                                    <h3>Basic plan</h3>
                                    <P> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid illum sed tempora reiciendis modi totam</P>
                                    <P class="price">$59</P>
                                    <ul>
                                        <li>choose jobs</li>
                                        <li>choose your plan</li>
                                        <li class="highlight">choose plan b</li>
                                        <li>plan b</li>
                                        <li>plan b</li>
                                        <li>This for plan b</li>
                                        <li>Choose plan b</li>
                                    </ul>
                                    <a class="btn btn-select"href="<?php echo base_url();?>/index.php/user_panel/package/2">select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                </main>

            </div>
        </div>
    </section><!-- /.main-containt -->
<?php include('footer.php');?>