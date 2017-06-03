<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_addItem.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>



<div class="container1">
	<h1> Add New Item </h1>
	<form action="<?php echo base_url();?>Manager/addItem" method="post">
		<div class="form-input">
			<input type="text" placeholder="Item Name" name="itemName"> <br>
			<input type="text" placeholder="Item Price" name="itemPrice"> <br>
			<input type="file" placeholder="Item Image" name="itemImage"> <br>
			<div class="styled-select">
			<select name="categoryID">
				<?php
					foreach($records as $row){ 
				?>
					<option value="<?=$row->categoryID ?> "> 		
						<?=$row->categoryName ?> 
					</option>
				<?php 
					} 
				?>
			</select> <br>
			</div>			
			<textarea name="itemDescription" placeholder="Description of Item" rows="5" cols="40" class="mytextarea"> </textarea> <br>
			<button type="reset" class="btn-reset"> RESET </button>
			<button type="submit" name="add" class="btn-add"> ADD </button>
			
		</div>
	</form>
</div>

</body>
</html>