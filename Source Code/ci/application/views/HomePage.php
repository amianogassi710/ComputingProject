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
				<h1 style="color:black;">PARADISE FOOD LAND</h1>
				<h2 style="color:black;">Online Food Ordering</h2>
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
				<a href="images/Chowmein.jpg"><img src="<?php echo base_url();?>assets/images/Chowmein.jpg" alt="gallery img"></a>
				<div>
					<h3>Chowmein</h3>
					<span>Buff / Veg </span>
				</div>
				<a href="images/Momo.jpg"><img src="<?php echo base_url();?>assets/images/Momo.jpg" alt="gallery img"></a>
				<div>
					<h3>Momo</h3>
					<span>Steam / Fried / C</span>
				</div>
			</div>
			<div class="col-md-4  wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/Pizza.jpg"><img src="<?php echo base_url();?>assets/images/Pizza.jpg" alt="gallery img"></a>
				<div>
					<h3>Pizza</h3>
					<span>Chicken / Mixed / Mushroom</span>
				</div>
			</div>
			<div class="col-md-4  wow fadeInUp" data-wow-delay="0.9s">
				<a href="images/Soup.jpg"><img src="<?php echo base_url();?>assets/images/Soup.jpg" alt="gallery img"></a>
				<div>
					<h3>Soup</h3>
					<span>Chicken / Mushroom / Vegetable</span>
				</div>
				<a href="images/Beverage.jpg"><img src="<?php echo base_url();?>assets/images/Beverage.jpg" alt="gallery img"></a>
				<div>
					<h3>Beverage</h3>
					<span>Milkshake / Sprite / Energy Drink</span>
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
				<h4>Momo .................................................................. <span>Rs 220</span></h4>
				<h5>Chicken / Buff / Vegetable</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Chowmein .............................................................. <span>Rs 150</span></h4>
				<h5>Buff / Veg</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Beverage ............................................................ <span>Rs 240</span></h4>
				<h5>Energy Drink / Sprite / Milkshake</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Alcoholic Beverage ................................................ <span>Rs 3000</span></h4>
				<h5>Tuborg / Carlsberg / Apple Cider</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Breakfast ............................................................. <span>Rs 270</span></h4>
				<h5>Egg / Sausage / Toast</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Snacks ................................................................... <span>Rs 315</span></h4>
				<h5>Chicken Chilli / Chicken Meat Ball / Fried Fish</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Pizza .................................................................... <span>Rs 440</span></h4>
				<h5>Chicken / Mixed / Mushroom</h5>
			</div>
			<div class="col-md-6 col-sm-6">
				<h4>Newari Khaja .......................................................... <span>Rs 400</span></h4>
				<h5>Khukhura ko Choela / Buff Choela / Khaja Set</h5>
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
					<h4>9843518777</h4>
				</div>
				<div class="address">
					<p><i class="fa fa-map-marker"></i> Our Location</p>
					<h4>Suryavinayak, Bhaktapur, Nepal</h4>
				</div>
			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Open Hours</h2>
					<p>Sun-Sat <span>6:00 AM - 9:00 PM</span></p>

			</div>
			<div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Follow Us</h2>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-linkedin wow bounceIn" data-wow-delay="0.9s"></a></li>
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