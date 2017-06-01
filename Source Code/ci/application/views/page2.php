<html>
<head>
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" /> 
</head>
<title>
</title>
<body>
Page 2. This is sarance hero.
<br>

<?php echo base_url(); ?>
<br>
<img src="<?php echo base_url();?>assets/img/uefa.jpg" height="330" width="500" />
<br>
<br>

<div id="body">
	<h2> Signup </h2>
	<form action="<?php echo base_url();?>Datamgmt/getData" method="post">
		Username: <input type="text" name="uname" /> <br>
		Password: <input type="password" name="pwd" /> <br>
		<br> <input type="submit" value="signup">
	</form>
</div>

<div id="body">
	<h2> Select All </h2>
	<form action="<?php echo base_url();?>Datamgmt/recData" method="post">
		<br> <input type="submit" value="select">
	</form>
</div>

<div id="body">
	<h2> Search User </h2>
	<form action="<?php echo base_url();?>Datamgmt/searchUser" method="post">
		Username: <input type="text" name="uname" /> <br>
		<br> <input type="submit" value="search">
	</form>
</div>



</body>
</html>