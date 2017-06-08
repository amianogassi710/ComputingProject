<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_myart.css">
</head>

<body>

<?php include 'public/public_nav.php'; ?>

<br>
<br>
<br>

<h1> Your Cart </h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr id= "main_heading">
					<td>Serial</td>
					<td>Item Name</td>
					<td>Quantity</td>
					<td>Price</td>
					<td>Amount</td>
					<td>Total</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				

<?php
	$num_rows=count($cartItem);
	if ($num_rows!=''){
		foreach($cartItem as $row){
?>

				<tr>
					<td> <?php echo $row->itemID; ?> </td>
					<td> <?php echo $row->itemID; ?> </td>
					<td> <input type="number" min="1" max="10" size="5" value="1"> </td>
					<td> <?php echo $row->itemID; ?> </td>
					<td>  <?php echo $row->itemID; ?> </td>
					<td> <?php echo $row->itemID; ?> </td>
					<td> 
						<?php echo anchor("Customer/deleteCartItem/{$row->cartID}", 'Delete', ['class'=>"btn btn-danger"]); ?> 
					</td>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
		<table>
			<tr>
				<td>
					Grand Total:
				</td>
			</tr>
		</table>
		<table align="right">
		<tr>
			<td> 
				<?php echo anchor("Customer/deleteCartItem/{$row->cartID}", 'Generate Invoice', ['class'=>"btn btn-danger"]); ?> 
			</td>
			<td> 
				<?php echo anchor("Customer/deleteCartItem/{$row->cartID}", 'Order Out', ['class'=>"btn btn-danger"]); ?> 
			</td>
		</tr>
		</table>
		
	<?php
	} else{
		echo "No Item in cart";
	}
	?>