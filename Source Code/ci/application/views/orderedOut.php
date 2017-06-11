<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_selectCategory.css">

<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").fadeIn();
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
    });
});
</script>
</head>
<body>
<?php include 'public/public_nav.php'; ?>
<br><br>
<br><br>
<div class="container1">
<h1> Successfully ordered </h1>

<button>Generate Bill</button><br><br>
<?php
		foreach($records as $row){
	echo $row->itemName;
	echo "<br>";
		}
?>
<br>
<br>
<div id="div2" style="width:80px;height:80px;display:none;background-color:green;">
<?php
		foreach($record as $row){
	?>
		<input type="text" name="grandTotal" value="<?php echo $row->Total;?>" >
	<?php
		}
	?></div><br>
<div id="div3" style="width:300px;height:80px;display:none;">
	<?php
		foreach($records as $row){
	echo $row->itemName;
	echo "<br>";
		}
	?>
</div>
</div>
</body>
</html>
