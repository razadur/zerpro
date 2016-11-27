<section class="main-containt">
    <div class="container">
        <div class="row">
            <main class="col-md-12 col-sm-12">
                <div class="candidate_panel" style="width:50%; margin:0 auto;">
                    <h2>Contact With Us</h2>
                    <form action="<?php echo base_url();?>index.php/withoutLogin_jobList/sendEmail" method="POST"  enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Your name:</label><br />
                                <input id="name" class="form-control" name="name" type="text" value="" size="30" /><br />
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Your email:</label><br />
                                <input id="email" class="form-control" name="email" type="email" value="" size="30" /><br />
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Your message:</label><br />
                                <textarea id="message" class="form-control" name="message" rows="7" cols="30"></textarea><br />
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <button type="submit" class="submit_btn btn btn-default" name="submit">Send Mail</button>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                    </form>
                </div>
                <br/>
            </main>

        </div>
    </div>
</section>
<br/>