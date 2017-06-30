<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Delete Item</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_DeleteItem.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<?php if ($load){ ?>
<div class="container1">
	<h1> Item  List </h1>
		<a href="<?php echo base_url();?>Home/adminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -285px; margin-top:-45px;" />
	</a>
	<?php echo form_open_multipart('Manager/searchItemsWithCategory');?>
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
		<input type="submit" value="SEARCH" name="add" class="btn btn-success" />

		</div>
	</form>
</div>	
<?php } else { ?> 	
<div class="container2">
<h1> Select Item for Delete</h1>
		<a href="<?php echo base_url();?>Manager/listCategoryForDelete"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -435px; margin-top:-30px;" />
	</a>
		<table class="table table-bordered table-inverse">
		<thead>
			<th> Name </th>
			<th> Price </th>
			<th> Action </th>
		</thead>
		<tbody>
		<?php 
			foreach($records as $row){ 
		?>
			<tr>
				<td> <?=$row->itemName ?> </td>
				<td> <?=$row->itemPrice ?> </td>
				<td> 
					<?php echo anchor("Manager/deleteItem/{$row->itemID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
				</td>
			</tr>
		<?php 
			} 
		?>	
		</tbody>
	</table>
</div>
<?php } ?>

</body>
</html>

//Aman