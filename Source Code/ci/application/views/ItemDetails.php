<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Item</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_ItemDetails.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container1">
<?php
	foreach ($ItemInfo as $row){
?>

	<h1> <?php echo $row->itemName; ?> </h1>
	<a href="<?php echo base_url();?>Customer/viewItem"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -280px; margin-top:-30px;" />
	</a>
	
	<img src="<?php echo base_url();?>assets/images/itemImage/<?php echo $row->itemImage; ?>" style="margin-left:117px;">;
		<table class="">
			<tr> 
				<th> Price: </th> 
				<td> <?php echo $row->itemPrice; ?> </td> 
			</tr>
			<tr> 
				<th> Category: </th> 
				<td> <?php echo $row->categoryName; ?> </td>
			</tr>
			<tr> 
				<th> Description: </th>
				<td> <?php echo $row->itemDescription; ?> </td>
			</tr>
		</table>
		<?php
	}
	?>
</div>

</body>
</html>