<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_selectCustomer.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		
</head>

<body>
<div class="container1">
	<h1> Customer List </h1>
	<table class="table">
		<thead>
			<tr>
				<td> Name </td>
				<td> Email </td>
				<td> Username </td>
				<td> Mobile Number </td>
				<td> District </td>
				<td> Street </td>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach($records as $row){ 
		?>
			<tr>
				<td> <?=$row->customerFirstName ?> <?=$row->customerLastName ?>  </td>
				<td> <?=$row->email ?> </td>
				<td> <?=$row->username ?> </td>
				<td> <?=$row->mobileNumber ?> </td>
				<td> <?=$row->district ?> </td>
				<td> <?=$row->street ?> </td>
			</tr>
		<?php 
			} 
		?>	
		</tbody>
	</table>
</div>

</body>
</html>