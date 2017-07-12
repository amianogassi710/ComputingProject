<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_myCart.css">
</head>

<body>

<?php include 'public/public_nav_C.php'; ?>
			
	<div style="margin-top:70px; margin-left:620px;position:absolute;"> <h1> My Cart </h1> </div>

	<div class="container1">
		<table class="table table-hover">
			<thead>
				<tr id= "main_heading">
					<td>Serial</td>
					<td>Name</td>
					<td>Quantity</td>
					<td>Amount</td>
					<td>Total</td>
					<td>Action</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$num_rows=count($cartItem);
				if ($num_rows!=''){
					foreach($cartItem as $row){
			?>	
			<form action="<?php echo base_url();?>Cart/updateCartItem" method="post">
				<tr>
					<input type="hidden" name="orderID" value="<?php echo $row->orderID; ?>">
					<td> <?php echo $row->orderID; ?> </td>
					<td> <?php echo $row->itemName; ?> </td>
					<td> <input type="number" min="1" max="10" name="itemQuantity" placeholder="Enter Quantity" value="<?php echo $row->quantity; ?>"> </td>
					<td> <?php echo $row->itemPrice; ?> </td>
					<td> <?php echo $row->totalAmount; ?> </td>
					<td> 
						<?php echo anchor("Cart/deleteCartItem/{$row->orderID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
					</td>
					<td> 
						<button type="submit" name="add" class="btn btn-danger"> UPDATE </button>
					</td>
				</tr>
				</form> 
			<?php
				}
			?>
			</tbody>
		</table>
	<?php
	} else{
		echo "No Item in cart";
	}
	?>
		<table>
			<tr>
				<td>
					<?php echo anchor("Customer/viewItem/", 'Add New', ['class'=>"btn btn-primary"]); ?> 
				</td>
			</tr>
		</table>
		<br>
		<table>
		<tr>
			<td> 
				<?php echo anchor("Cart/generateInvoice/{}", 'Order Out', ['class'=>"btn btn-danger"]); ?> 
			</td>
		</tr>
		</table>
	</div>
	
</body>
</html>