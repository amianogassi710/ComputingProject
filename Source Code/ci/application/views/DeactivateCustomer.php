<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_DeleteItem.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>



<?php if ($load){ ?>
<div class="container1">
	<h1> Search Customer For Delete </h1>
	
	<?php echo form_open_multipart('Manager/searchCustomer');?>
	<div class="styled-select">
		<input type="text" name="customerID" placeholder="Customer ID"> <br> <br>		
		<input type="text" name="customerFirstName" placeholder="Customer First Name"> <br> <br>		
		<input type="text" name="customerLastName" placeholder="Customer Last Name">		
			<br> <br>
		<input type="submit" value="SEARCH" name="add" class="btn-search" />

		</div>
	</form>
</div>	
<?php } else { ?> 	
<div class="container2">
<h1> Select Item for Delete</h1>
	<div class="back">
		<a href="<?php echo site_url('Manager/listCategoryForDelete') ?>">Back</a>
	</div>
	<table class="table">
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
					<?php echo anchor("Manager/deleteItem/{$row->customerID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
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