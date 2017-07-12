<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Deactivate Customer</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_deactivateCustomer.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<?php 
	if ($load){ 
	?>
<div class="container1">
	<h1> Select Customer </h1>
	<a href="<?php echo base_url();?>Home/adminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -285px; margin-top:-20px;" />
	</a>
	<?php echo form_open_multipart('Manager/searchCustomer');?>
	<div class="styled-select">
		<input type="text" name="customerID" placeholder="Customer ID"> <br> <br>		
		<input type="text" name="customerFirstName" placeholder="Customer First Name"> <br> <br>		
		<input type="text" name="customerLastName" placeholder="Customer Last Name">		
			<br> <br>
		<input type="submit" value="SEARCH" name="add" class="btn btn-primary" />

		</div>
	</form>
</div>	
<?php 
	} 
	else { 
?> 	
<div class="container2">
<h1> Deactivate Customer</h1>
	<a href="<?php echo base_url();?>Home/deactivateCustomer"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -435px; margin-top:-30px;" />
	</a>
		<table class="table table-bordered table-inverse">
		<thead>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Action </th>
		</thead>
		<tbody>
		<?php 
			foreach($records as $row){ 
		?>
			<tr>
				<td> <?=$row->customerFirstName ?> </td>
				<td> <?=$row->customerLastName ?> </td>
				<td> 
					<?php echo anchor("Manager/deleteCustomer/{$row->customerID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
				</td>
			</tr>
		<?php 
			} 
		?>	
		</tbody>
	</table>
</div>
<?php 
	} 
?>

</body>
</html>