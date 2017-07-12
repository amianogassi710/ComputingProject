<!DOCTYPE html>
<html>
<head>
<title> Transaction </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_viewTranscation.css">
</head>
<script>
$(document).ready(function(){
	$("#btn2").click(function(){
        $("#out").fadeOut();
        $("#div3").fadeIn("slow");
    });
});
</script>

</head>
<body>
<?php include 'public/public_nav_C.php'; ?>
<div class="container1">

<h1> Select Criteria </h1>
	<a href="<?php echo base_url();?>Home/adminDashboard"> 
		<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -250px; margin-top:-20px;position:fixed;" />
	</a>

<button id="btn2" class="btn btn-primary select"> Select Date </button><br><br>
<br>

<div id="div3" style="display:none;">
	<form action="<?php echo base_url();?>Manager/viewTransaction" method="post">
	<input type="date" name="Sdate">
	<input type="date" name="Edate"> <br> 
	<input type="submit" class="btn btn-primary">
	</form>
</div>

<div id="out">

<?php
	if ($load==FALSE){?>	
		<table class="table">
			<tr>
				<th> Customer ID </th>
				<th> Order ID </th>
				<th> Total Amount </th>
			</tr>	
			<?php
				$sum=0;
				foreach ($records as $row){
			?>
				<tr>
					<td> <?php echo $row->customerID; ?> </td>
					<td> <?php echo $row->orderID; ?> </td>
					<td> <?php echo $row->totalAmount; ?> </td>
					<?php $sum+=$row->totalAmount; ?>
				</tr>
			<?php	
				}
			?>
	<div style="font-size: 1.6em;margin-left: 200px;color:#3C1F00;"> <b> Grand Total: Rs  <?php  echo $sum; ?> </b> </div>
	<?php
		}
	?>
		</table>
	</div>
</div>

</body>
</html>