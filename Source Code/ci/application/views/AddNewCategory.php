<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Category</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_addCategory.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container1">
	<h1> Add New Category </h1>
	<a href="<?php echo base_url();?>Home/adminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -280px; margin-top:-25px;" />
	</a>
	
	<span id="error"> <?php echo validation_errors(); ?> </span>

	<form action="<?php echo base_url();?>Manager/addCategory" method="post">
		<div class="form-input">
			<input type="text" placeholder="Category Name" name="categoryName"> <br>

			<button type="reset" class="btn btn-warning"> RESET </button>
			<button type="submit" name="add" class="btn btn-success"> ADD </button>
		</div>
	</form>
</div>

</body>
</html>