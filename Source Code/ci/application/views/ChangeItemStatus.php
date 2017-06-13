<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_changeItemStatus.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>

<div class="container1">
	<h1> Change Item Status </h1>
	<a href="<?php echo base_url();?>Home/adminDashboard"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -415px; margin-top:-50px;" />
	</a>
	<?php 
		foreach ($records as $row) {
			$status=$row->itemStatus;			
	?>
	
	<?php 
		echo form_open_multipart('Manager/changeStatus');
	?>
		<div class="styled-select">
			<input type="hidden" value="<?=$row->itemID;?>" name="itemID">
			<input type="text" value="<?=$row->itemName;?>">
			<select name="itemStatus">	
				
			<?php	
				if ($status === 'Not Available'){ 
			?>
					<option value="<?=$row->itemStatus;?>"> <?=$row->itemStatus;?> </option>
					<option> Available </option> 
				
			<?php 
				} else 
				{ 
			?>
				
					<option value="<?=$row->itemStatus;?>"> <?=$row->itemStatus;?> </option>
					<option> Not Available </option> 
				
			<?php 
				} 
			?>	
			</select>
			<input type="submit" class="btn-change" value="CHANGE">
		</div>
	<?php
		echo form_close();
	?>
	
	<?php 
		} 
	?>
</div>

</body>
</html>