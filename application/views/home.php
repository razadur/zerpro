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
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
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
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
					<a href="#">
						<h5>1000</h5>
						<h3>Electritians</h3>
					</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
				<div class="col-md-4">
					<div class="box">
						<a href="#">							
							<h5>1000</h5>
							<h3>Electritians</h3>
						</a>
					</div><!-- /.box -->
				</div>
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
				<div class="sponsore-carousel">
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
					<div class="item"><a href="#"><img src="http://placehold.it/200x100" alt=""></a></div>
				</div>
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

 </script>

	<?php include('footer.php'); ?>