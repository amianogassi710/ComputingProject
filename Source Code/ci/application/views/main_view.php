<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
</head>

<body>
<?php echo $error; ?>
	<?php echo form_open_multipart('Manager/upload');?>
	<input type="file" name="userfile">
	<input type="Submit" name="submit" value="upload image">

</body>
</html>