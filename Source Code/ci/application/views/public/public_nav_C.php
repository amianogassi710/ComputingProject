<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<style>

.dropdown-content {
    display: none;
    position: absolute;
    
    box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
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
				<li>
					<div class="dropdown" style="line-height:57px; margin-left:13px; font-family: 'Roboto', sans-serif; font-weight: 400;">
						<a href="<?php echo site_url('Customer/logout') ?>" class="smoothScroll">
							<?php $sessionData1=$this->session->userdata('username'); echo $sessionData1;?>
						</a>
						<div class="dropdown-content">
							<a href="<?php echo site_url('Customer/updateProfile') ?>">PROFILE</a>
							<a href="<?php echo site_url('Customer/logout') ?>">LOGOUT</a>
						</div>
					</div>
					 
				</li>
			</ul>
		</div>
	</div>
</section>

<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/wow.min.js"></script> <!--Animate.min.css-->

</body>
</html>