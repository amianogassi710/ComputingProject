<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Category</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_updateCategory.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav_M.php'; ?>

<div class="container3">
	<h1> Category List </h1>
		<a href="<?php echo base_url();?>Home/adminDashboard"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -250px; margin-top:-10px;" />
	</a>
	<table class="table">
		<thead>
			<th> Name </th>
			<th> Action </th>
		</thead>
		<tbody>
		<?php 
			foreach($records as $row){ 
		?>
			<tr>
				<td> <?=$row->categoryName ?> </td>
				<td> 
					<?php echo anchor("Manager/editCategory/{$row->categoryID}", 'Edit', ['class'=>"btn btn-primary"]); ?> 
				</td>
			</tr>
		<?php 
			} 
		?>	
		</tbody>
	</table>
</div>

</body>
</html>