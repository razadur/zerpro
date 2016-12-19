<?php include('home_header.php'); ?>
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="hero-text">
					<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, earum?</h1>
				</div>
				<div class="hero-form">
					<form action="<?php echo base_url();?>index.php/welcome/search_job" method="POST" id="mailchimpForm" class="form-inline form-white">
                    <div class="form-group">
                       
						
						<select name="category" required class="form-control selectpicker" data-width="auto" onChange="showUser(this.value)">
															<option value="">Select Category</option>
															<?php foreach($get_all_categories as $get_category){ ?><option value="<?php echo $get_category->category_name; ?>"><?php echo $get_category->category_name; ?></option>
															<?php } ?>
														</select>
                    </div>
                    <div class="form-group">
						<div id="txtHint">
                        <select class="form-control selectpicker" data-width="auto">
						  <option value="volvo">Select Sub-Category</option>
						  
						</select> 
						</div>
                    </div>
                    <button class="btn btn-primary btn-go" type="submit">Lets go</button>
                </form>
				</div>
			</div>
		</div>
	</section><!-- /.hero-section -->

	<section class="expertise">
		<div class="container">
			<div class="row">
				<div class="section-heading">
					<h1>Connect with pepople who have expertise as</h1>
					<p>Get access to potential candidates that have the required skillsets</p>
				</div>
			</div>
			<div class="row">
                <?php
                $i=0;
                foreach($get_all_categories as $get_all_categorie){ $i++;
                    $category = $get_all_categorie->category_name;
                    ?>
                    <div class="col-md-4">
                        <div class="box">
                            <a href="<?php echo base_url()."index.php/withoutLogin_jobList/jobList/$category";?>">
                                <?php
                                $sql = "SELECT * FROM (category) JOIN manage_job ON category_name = category WHERE category = '$category'";
                                $query = $this->db->query($sql);
                                $result = $query->num_rows();
                                ?>
                                <h5><?php echo $result?></h5>
                                <h3><?php echo $category;?></h3>
                            </a>
                        </div><!-- /.box -->
                    </div>
                    <?php
                    if($i==6){break;}
                }
                ?>
			</div><!-- /.row -->
		</div>
	</section><!-- /.expertise -->

	<section class="industry">
		<div class="container">
			<div class="row">
				<div class="section-heading">
					<h1>Connect with pepople who have expertise as</h1>
					<p>Get access to potential candidates that have the required skillsets</p>
				</div>
			</div>
			<div class="row">
                <?php
                $i=0;
                foreach($get_all_spcializations as $get_all_spcialization){ $i++;
                $spcialization = $get_all_spcialization->spcialization;
                ?>
                <div class="col-md-4">
                    <div class="box">
                        <a href="<?php echo base_url()."index.php/withoutLogin_jobList/frelancer_list/$spcialization";?>">
                            <?php
                            $sql = "SELECT * FROM (user_profile_info) WHERE spcialization LIKE '%$spcialization%'";
                            $query = $this->db->query($sql);
                            $result = $query->num_rows();
                            ?>
                            <h5><?php echo $result?></h5>
                            <h3><?php echo $spcialization;?></h3>
                        </a>
                    </div><!-- /.box -->
                </div>
                <?php
                if($i==6){break;}
                }
                ?>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.industry -->

	<section class="sponsors">
		<div class="container">
			<div class="row">
				<div class="section-heading">
					<h1>Sponsors</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, accusamus.</p>
				</div>
			</div>
			<div class="row">
				<!--<div class="sponsore-carousel">
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
				</div>-->
                <!--<ul class="sponsore-carousel">
                    <li class="item"><img src="http://placehold.it/200x100&text=1" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=2" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=3" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=4" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=5" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=6" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=7" /></li>
                    <li class="item"><img src="http://placehold.it/200x100&text=8" /></li>
                </ul>-->
                <script src="<?php echo base_url();?>assets/slide/js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    jssor_1_slider_init = function() {

                        var jssor_1_options = {
                            $AutoPlay: true,
                            $Idle: 0,
                            $AutoPlaySteps: 4,
                            $SlideDuration: 1500,
                            $SlideEasing: $Jease$.$Linear,
                            $PauseOnHover: 4,
                            $SlideWidth: 140,
                            $Cols: 7
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                        function ScaleSlider() {
                            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                            if (refSize) {
                                refSize = Math.min(refSize, 809);
                                jssor_1_slider.$ScaleWidth(refSize);
                            }
                            else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }
                        ScaleSlider();
                        $Jssor$.$AddEvent(window, "load", ScaleSlider);
                        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                        /*responsive code end*/
                    };
                </script>
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; visibility: hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden;">
                        <div>
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/amazon.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/android.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/bitly.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/blogger.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/dnn.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/drupal.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/ebay.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/facebook.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/google.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/ibm.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/ios.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/joomla.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/linkedin.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/mac.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/magento.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/pinterest.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/samsung.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/twitter.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/windows.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/wordpress.jpg" />
                        </div>
                        <div style="display: none;">
                            <img data-u="image" src="<?php echo base_url();?>assets/slide/img/youtube.jpg" />
                        </div>
                    </div>
                </div>
                <script type="text/javascript">jssor_1_slider_init();</script>
            </div>
		</div>
	</section><!-- /.sponsors -->
	
	
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
  xmlhttp.open("GET","<?php echo base_url(); ?>index.php/welcome/get_spcialization2?q="+str,true);
  xmlhttp.send();
}

    $('.sponsore-carousel').bxSlider({
        minSlides: 1,
        maxSlides: 8,
        slideWidth: 189,
        slideMargin: 0,
        ticker: true,
        speed: 50000
    });
 </script>
<script src="http://cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.min.js"></script>

	<?php include('footer.php'); ?>