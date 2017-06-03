<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_addCategory.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>

<div class="container1">
	<h1> Add New Category </h1>
	<form action="<?php echo base_url();?>Manager/addCategory" method="post">
		<div class="form-input">
			<input type="text" placeholder="Category Name" name="categoryName"> <br>
			<button type="reset" class="btn-reset"> RESET </button>
			<button type="submit" name="add" class="btn-add"> ADD </button>
		</div>
	</form>
</div>

</body>
</html>