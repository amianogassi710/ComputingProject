<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	
</head>
<body>

<?php include 'public/public_nav.php'; ?>

<!-- home section -->
<section id="home">
	<div class="container">
				<h1>PARADISE FOOD LAND</h1>
				<h2>Online &amp; Food Ordering</h2>
				<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>
	</div>		
</section>

<!-- gallery section -->
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h1 class="heading">Food Gallery</h1>
				<hr>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s"> <!--Animate.min.css wow.min.js-->
				<a href="images/gallery-img1.jpg"><img src="<?php echo base_url();?>assets/images/gallery-img1.jpg" alt="gallery img"></a>
				<div>
					<h3>Lemon-Rosemary Prawn</h3>
					<span>Seafood / Shrimp / Lemon</span>
				</div>
				<a href="images/gallery-img2.jpg"><img src="<?php echo base_url();?>assets/images/gallery-img2.jpg" alt="gallery img"></a>
				<div>
					<h3>Lemon-Rosemary Vegetables</h3>
					<span>Tomato / Rosemary / Lemon</span>
				</div>
			</div>
			<div class="col-md-4  wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/gallery-img3.jpg"><img src="<?php echo base_url();?>assets/images/gallery-img3.jpg" alt="gallery img"></a>
				<div>
					<h3>Lemon-Rosemary Bakery</h3>
					<span>Bread / Rosemary / Orange</span>
				</div>
			</div>
			<div class="col-md-4  wow fadeInUp" data-wow-delay="0.9s">
				<a href="images/gallery-img4.jpg"><img src="<?php echo base_url();?>assets/images/gallery-img4.jpg" alt="gallery img"></a>
				<div>
					<h3>Lemon-Rosemary Salad</h3>
					<span>Chicken / Rosemary / Green</span>
				</div>
				<a href="images/gallery-img5.jpg"><img src="<?php echo base_url();?>assets/images/gallery-img5.jpg" alt="gallery img"></a>
				<div>
					<h3>Lemon-Rosemary Pizza</h3>
					<span>Pasta / Rosemary / Green</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- menu section -->
<section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h1 class="heading">Special Menu</h1>
				<hr>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Vegetable ................ <span>$20.50</span></h4>
				<h5>Chicken / Rosemary / Lemon</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Meat ........................... <span>$30.50</span></h4>
				<h5>Meat / Rosemary / Lemon</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Pork ........................ <span>$40.75</span></h4>
				<h5>Pork / Tooplate / Lemon</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Orange-Rosemary Salad .......................... <span>$55.00</span></h4>
				<h5>Salad / Rosemary / Orange</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Squid ...................... <span>$65.00</span></h4>
				<h5>Squid / Rosemary / Lemon</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Orange-Rosemary Shrimp ........................ <span>$70.50</span></h4>
				<h5>Shrimp / Rosemary / Orange</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Prawn ................... <span>$110.75</span></h4>
				<h5>Chicken / Rosemary / Lemon</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Lemon-Rosemary Seafood ..................... <span>$220.50</span></h4>
				<h5>Seafood / Rosemary / Lemon</h5>
			</div>
		</div>
	</div>
</section>		

<!-- contact section -->
<section id="contact" class="">
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h1 class="heading">Contact Us</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 wow fadeIn" data-wow-delay="0.9s">
				<form action="#" method="post">
					<div class="col-md-6">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
				  </div>
					<div class="col-md-6">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
				  </div>
					<div class="col-md-12">
						<textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
					</div>
					<div class="col-md-offset-3 col-md-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="make a reservation">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>

<!-- map -->
<section id="map" class="">
<div class="mapwrapper">
    <div id="map" class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7067.246204139123!2d85.4148698152158!3d27.66713032552375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aa16d09a7c3%3A0xcec38ed29a51cc4c!2sParadise+Food+Land!5e0!3m2!1sen!2seg!4v1492970861086"   class="googlemap"></iframe>
    </div> 
</div>
<section>



<!-- footer section -->
<footer class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Contact Info.</h2>
				<div class="ph">
					<p><i class="fa fa-phone"></i> Phone</p>
					<h4>090-080-0760</h4>
				</div>
				<div class="address">
					<p><i class="fa fa-map-marker"></i> Our Location</p>
					<h4>120 Duis aute irure, California, USA</h4>
				</div>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Open Hours</h2>
					<p>Sunday <span>10:30 AM - 10:00 PM</span></p>
					<p>Mon-Fri <span>9:00 AM - 8:00 PM</span></p>
					<p>Saturday <span>11:30 AM - 10:00 PM</span></p>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Follow Us</h2>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<!-- copyright section -->
<section id="copyright">
	<div class="container">
			<div class="col-md-12">
				<h3>Restaurant</h3>
				<p>Copyright © Aman Garu 
                | Design: <a rel="nofollow" href="https://www.facebook.com/aman.garu.12" >Aman</a></p>
			</div>
	</div>
</section>

</body>
</html>