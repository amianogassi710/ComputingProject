<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_updateItem.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>

<div class="container2">
		<h1> Update Item </h1>

	
	<?php
		foreach($item as $row){
	?>
	
	<form action="<?php echo base_url();?>Manager/updateItem" method="post">
		<div class="form-input">
			<input type="hidden" name="hiddenID" value="<?php echo $row->itemID; ?>" > <br>
			<label for="name"> Item Name </label>
			<input type="text" placeholder="Category Name" name="itemName" value="<?php echo $row->itemName; ?>" ><br>
			<label for="name"> Item Price </label>
			<input type="text" placeholder="Category Name" name="itemPrice" value="<?php echo $row->itemPrice; ?>" ><br>
			<label for="name"> Item Description </label>
			<input type="text" placeholder="Category Name" name="itemDescription" value="<?php echo $row->itemDescription; ?>" ><br>
			<button type="reset" class="btn-reset"> RESET </button>
			<button type="submit" name="add" class="btn-add"> UPDATE </button>
		</div>
	</form>
</div>
	<?php
		}
	?>

</body>
</html>