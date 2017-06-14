<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_updateItem.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container1">
	
<?php	
if ($load)	{ ?>
	<div id="select">
	<h2> Select Items For Update</h2>
		<a href="<?php echo base_url();?>Home/adminDashboard"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -295px; margin-top:-10px;" />
	</a>
	
	<?php 
		echo form_open_multipart('Manager/selectItemDescription');
	?>
		<div class="styled-select">

			<select name="itemID">
				<?php
					foreach($records as $row){ 
				?>
				<option value="<?=$row->itemID ?> "> 		
					<?=$row->itemName ?> 
				</option>
				<?php 
					} 
				?>
			</select>
		</div>
			<input type="submit" value="SELECT" name="add" class="btn btn-primary" />		
	<?php 
		echo form_close();
	?>
	</div>
<?php } else { ?>	
	<div id=edit>
	<h1> Item Description </h1>
			<a href="<?php echo base_url();?>Manager/listItemUpdate"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -815px; margin-top:-50px;" />
	</a>
	
		<table class="table table-bordered table-inverse">
		<tr>
			<th> Item ID </th>
			<th> Name </th>
			<th> Price </th>
			<th> Category </th>
			<th> Item Description </th>
			<th> Action </th>
		</tr>
		<?php 
			foreach($itemDesc as $row){ 
		?>
			<tr>
				<td> <?=$row->itemID ?> </td>
				<td> <?=$row->itemName ?> </td>
				<td> <?=$row->itemPrice ?> </td>
				<td> <?=$row->categoryName ?> </td>
				<td> <?=$row->itemDescription ?> </td>
				<td> 
					<?php echo anchor("Manager/editItem/{$row->itemID}", 'Edit', ['class'=>"btn btn-success"]); ?> 
				</td>
			</tr>
		
		<?php 
			} 
		?>	
	</table>
</div>	
<?php } ?>
</div>

</body>
</html>