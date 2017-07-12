<!DOCTYPE html>
<html>
<head>
<title> Order History </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_viewOrder.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container1">
<h1> Order History </h1>
<a href="<?php echo base_url();?>Home/AdminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -1175px; margin-top:-60px;" />
</a>
<table class="table">
  <thead>
    <tr>
		<th>#</th>
		<th>Item Name</th>
		<th>Customer ID</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Amount</th>
    </tr>
  </thead>
  <tbody>  
	<?php
		$i=1;
		foreach($records as $row){
	?>
		<form action="<?php echo base_url();?>Manager/updateStatus" method="post">

	<tr>
	<input type="hidden" name="orderID" value="<?php echo $row->orderID; ?>"> 
		<th> <?php echo $i ?> </th> 
		<td scope="row"><?php echo $row->itemName; ?></td>
		<td scope="row"><?php echo $row->customerID ?></td>
		<td><?php echo $row->quantity; ?></td>
		<td><?php echo $row->itemPrice; ?></td>
		<td><?php echo $row->totalAmount; ?></td>	
	</tr>
	</form>

	<?php
		$i++;
		}
	?>
  
  </tbody>
</table>

</div>
</body>
</html>