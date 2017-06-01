<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_signup.css">
</head>
<body>

<?php include 'public/public_nav.php'; ?>

<div>
<div class="container2">
	<form action="<?php echo base_url();?>Customer/register" method="post">
		<div class="form-input">
			
			<input type="text" placeholder="Firstname" name="firstname"> <br>
			<input type="text" placeholder="Lastname" name="lastname"> <br>
			<input type="email" placeholder="Email" name="email"> <br>
			<input type="text" placeholder="Username" name="username"> <br>
			<input type="password" placeholder="Password" name="password"> <br>
			<input type="text" placeholder="Mobile Number" name="mobilenumber"> <br>
			<div class="select_join">
			<select name="district">
				<option value="bhaktapur"> Bhaktapur </option>
				<option value="kathmandu"> Kathmandu </option>
				<option value="lalitpur"> Lalitpur </option>
			</select>
			<div style="margin-top: -9px;"> <br>
			<input type="text" placeholder="Street" name="street" style="margin-bottom: 24px;"> <br>
			<button type="reset" name="cancel" class="btn-cancel"> RESET </button>
			<button type="submit" name="signup" class="btn-login"> SIGNUP </button>
			<br>
			<div style="margin-top:8px;">
				<a href="<?php echo site_url('Home/login') ?>" style="color:red;"> Already Registered? </a>
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>