<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>

<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>


<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation"> 
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">PARADISE</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url('Home/index#home') ?>" class="smoothScroll">HOME</a></li>
				<li><a href="<?php echo site_url('Home/index#gallery') ?>" class="smoothScroll">FOOD GALLERY</a></li>
				<li><a href="<?php echo site_url('Home/index#menu') ?>" class="smoothScroll">SPECIAL MENU</a></li>
				<li><a href="<?php echo site_url('Home/index#map') ?>" class="smoothScroll">MAP</a></li>
				<li><a href="<?php echo site_url('Home/index#contact') ?>" class="smoothScroll">CONTACT</a></li>
				<li><a href="<?php echo site_url('Home/login') ?>" class="smoothScroll">LOGIN</a></li>
			</ul>
		</div>
		<div>
		My Cart
		</div>
		<div>
			<ul class="navbar-nav nav nav1 navbar-right" style="margin-left:531px;">
				<li><a href="<?php echo site_url('Home/index#home') ?>" class="smoothScroll">My Cart</a></li>
				<li><a href="<?php echo site_url('Home/index#home') ?>" class="smoothScroll">My Profile</a></li>
				<li><a href="<?php echo site_url('Home/index#map') ?>" class="smoothScroll">Logout</a></li>
			</ul>
		</div>
	</div>
</section>
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/wow.min.js"></script> <!--Animate.min.css-->

</body>
</html>