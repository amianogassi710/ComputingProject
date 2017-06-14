<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_viewOrder.css">

</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container1">

<table class="table">
  <thead>
    <tr>
		<th>#</th>
		<th>Item Name</th>
		<th>Customer ID</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Confirm Delivery</th>
		<th>Confirm Payment</th>
    </tr>
  </thead>
  <tbody>  
	<?php
		$i=1;
		foreach($records as $row){
	?>
	<tr>
		<th> <?php echo $i ?> </th> 
		<td scope="row"><?php echo $row->itemName; ?></td>
		<td scope="row"><?php echo $row->customerID ?></td>
		<td><?php echo $row->quantity; ?></td>
		<td><?php echo $row->itemPrice; ?></td>
		<td><?php echo $row->totalAmount; ?></td>
		<td>
	<form action="<?php echo base_url();?>Manager/updateCategory" method="post">
				<input type="radio" name="deliver" id="Yes" value="Yes"/>
				<label for="example1">Yes</label>
				<input type="radio" name="deliver" id="No" value="No" />
				<label for="example1">No</label>
			</form>
		</td>
		<td><?php echo $row->totalAmount; ?></td>
	</tr>
	<?php
		$i++;
		}
	?>
  
  </tbody>
</table>

</div>
</body>
</html>
