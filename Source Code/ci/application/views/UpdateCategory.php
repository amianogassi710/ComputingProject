<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Category</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_updateCategory.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container2">
	<h1> Update Category </h1>
		<a href="<?php echo base_url();?>Manager/listCategoryUpdate"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -300px; margin-top:0px;" />
	</a>

	<?php
		foreach($category as $row){
	?>
		
	<form action="<?php echo base_url();?>Manager/updateCategory" method="post">
		<div class="form-input">
			<input type="hidden" name="hiddenID" value="<?php echo $row->categoryID; ?>" > <br>
			<input type="text" placeholder="Category Name" name="categoryName" value="<?php echo $row->categoryName; ?>" ><br>
			<button type="reset" class="btn btn-warning"> RESET </button>
			<button type="submit" name="add" class="btn btn-success"> UPDATE </button>
		</div>
	</form>
</div>

<?php
	}
?>

</body>
</html>