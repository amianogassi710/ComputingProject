<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Item</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_addItem.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>


<div class="container1">
	<h1> Add New Item </h1>
	<a href="<?php echo base_url();?>Home/adminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -280px; margin-top:-30px;" />
	</a>
	
	<span id="error"> <?php echo validation_errors(); ?> </span>
	
	<?php echo form_open_multipart('Manager/addItems');?>
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
			<button type="reset" class="btn btn-warning"> RESET </button>
			<input type="submit" value="ADD" name="add" class="btn btn-success" />

		</div>
	</form>
</div>

</body>
</html>