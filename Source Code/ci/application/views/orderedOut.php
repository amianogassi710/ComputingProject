<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_OrderedOut.css">
</head>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
    });
});
</script>
<script>
function Print() {
    window.print();
}
</script>
</head>
<body>
<?php include 'public/public_nav.php'; ?>
<div class="navs">
			<ul class="navbar-nav nav nav1 navbar-right" style="margin-left:531px;">
    <li style="margin-right: 290px;"> <h3> Invoice <h3> </li>
				<li> <?php echo anchor("Customer/updateProfile/{}", 'My Profile', ['class'=>"btn btn-add"]); ?> </li>
				<li> <?php echo anchor("Customer/logout/{}", 'Logout', ['class'=>"logout btn btn-add"]); ?> </li>
			</ul>
</div>



<div class="container1">
<h1> Successfully ordered!!! </h1>

<button class="btn btn-primary"> Generate Bill </button><br><br>
<br>

<div id="div2" style="display:none;">
<table class="bill table table-hover">
  <thead>
    <tr>
		<th>#</th>
		<th>Item Name</th>
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
	<tr>
		<th> <?php echo $i ?> </th> 
		<td scope="row"><?php echo $row->itemName; ?></td>
		<td><?php echo $row->quantity; ?></td>
		<td><?php echo $row->itemPrice; ?></td>
		<td><?php echo $row->totalAmount; ?></td>
	</tr>
	<?php
		$i++;
		}
	?>
  
  </tbody>
</table>
</div>

<div id="div3" style="width:80px;height:80px;display:none;">
	<?php
		foreach($record as $row){
	?>
		<table> 
			<tr> 
				<td> <label style="margin-left:50px;"> Total: </label>  </td>  
				<td> <input type="text" class="total" name="grandTotal" value="Rs <?php echo $row->Total;?>" readonly> </td>
				<td> <button class="btn btn-primary" id="print" onclick="Print()">Print</button> </td>

			</tr>
		</table>
	<?php
		}
	?>
</div>

</div>
</body>
</html>
