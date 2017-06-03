<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_selectCategory.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>

<div class="container1">
	<h1> Category List </h1>
	<table class="table">
		<tbody>
		<?php 
			foreach($records as $row){ 
		?>
			<tr>
				<td> <?=$row->categoryName ?> </td>
			</tr>
		<?php 
			} 
		?>	
		</tbody>
	</table>
</div>

</body>
</html>