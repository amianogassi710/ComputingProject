<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_login.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>

<div class="container1">
	<img src="<?php echo site_url('assets/images/rsz_user.png') ?>">
	<form action="<?php echo base_url();?>Customer/login" method="post">
		<div class="form-input">
			<input type="text" placeholder="Username" name="username"> <br>
			<input type="password" placeholder="Password" name="password"> <br>
			<button type="reset" name="cancel" class="btn-cancel"> RESET </button>
			<button type="submit" name="login" class="btn-login"> LOGIN </button>
		</div>
	</form>
	<br> <a href="#" style="color:red;"> Forget Password ? </a>
	<br> <br> <a href="<?php echo site_url('Home/signup') ?>" style="color:red;"> Not Register Yet? Register Now!! </a>
</div>

</body>
</html>