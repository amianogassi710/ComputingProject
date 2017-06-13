<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_myCart.css">
</head>

<body>

<?php include 'public/public_nav.php'; ?>
<div class="navs">
			<ul class="navbar-nav nav nav1 navbar-right" style="margin-left:531px;">
    <li style="margin-right: 290px;"> <h3> My Cart <h3> </li>
				<li> <?php echo anchor("Customer/updateProfile/{}", 'My Profile', ['class'=>"btn btn-add"]); ?> </li>
				<li> <?php echo anchor("Customer/logout/{}", 'Logout', ['class'=>"logout btn btn-add"]); ?> </li>
			</ul>
</div>

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
					<input type="hidden" name="cartID" value="<?php echo $row->cartID; ?>">
					<td> <?php echo $row->cartID; ?> </td>
					<td> <?php echo $row->itemName; ?> </td>
					<td> <input type="number" min="1" max="10" name="itemQuantity" placeholder="Enter Quantity" value="<?php echo $row->quantity; ?>"> </td>
					<td> <?php echo $row->itemPrice; ?> </td>
					<td> <?php echo $row->totalAmount; ?> </td>
					<td> 
						<?php echo anchor("Cart/deleteCartItem/{$row->cartID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
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