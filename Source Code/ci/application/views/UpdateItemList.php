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

<div class="container1">
	
<?php	
if ($load)	{ ?>
<h1> Update Items </h1> <br> <br>
	<br>
	<div id="select">
	<h2> Select Items </h2>
	
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
			<input type="submit" value="SELECT" name="add" class="btn-add" />		
	<?php 
		echo form_close();
	?>
	</div>
<?php } else { ?>	
	<div class="back">
		<a href="<?php echo site_url('Manager/listItemUpdate') ?>">Back</a>
	</div>
	<h1> Item Description </h1>
	<table 	border='1'>
		<tr>
			<td> Item ID </td>
			<td> Name </td>
			<td> Price </td>
			<td> Category </td>
			<td> Item Description </td>
			<td> Action </td>
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
					<?php echo anchor("Manager/editItem/{$row->itemID}", 'Edit', ['class'=>"btn btn-primary"]); ?> 
				</td>
			</tr>
		<?php 
			} 
		?>	
	</table>	
<?php } ?>
</div>

</body>
</html>