<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_selectItem.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/defaults.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/demo.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/accordion.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.1.4.2.js"></script>

	
	
	
</head>

<body>
<br> <br> <br>
<script>
	$(document).ready(function(){
    $("#Breakfast").click(function(){
		var fullname=$('#myBreakfast').val();
		var aa=document.getElementById("myBreakfast").value;
		$.ajax({
			type:'POST',
			data:{fullname: fullname},
			url:'<?php echo site_url('Manager/hello'); ?>',
			success: function(result){
				$('#ourBreakfast').html(result);
			}
		});
    });
});	
$(document).ready(function(){
    $("#Snacks").click(function(){
        alert ('yy');
		var fullname=$('#mySnacks').val();
		var aa=document.getElementById("mySnacks").value;
		alert (aa);
		alert (fullname);
		$.ajax({
			type:'POST',
			data:{fullname: fullname},
			url:'<?php echo site_url('Manager/hello'); ?>',
			success: function(result){
				$('#ourSnacks').html(result);
			}
		});
    });
});
$(document).ready(function(){
    $("#Soup").click(function(){
        alert ('yy');
		var fullname=$('#mySoup').val();
		var aa=document.getElementById("mySoup").value;
		alert (aa);
		alert (fullname);
		$.ajax({
			type:'POST',
			data:{fullname: fullname},
			url:'<?php echo site_url('Manager/hello'); ?>',
			success: function(result){
				$('#ourSoup').html(result);
			}
		});
    });
});
</script> 


<br>
<br>
<br>


<?php
	foreach($record as $row){ 
?>

<div class="main">
	<div class="accordion">
		<div class="accordion-section">
			<a class="accordion-section-title" href="#<?php echo $row->categoryName; ?>"><?php echo $row->categoryName; ?></a>
			<div id="<?php echo $row->categoryName; ?>" class="accordion-section-content">
				<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae. <br> </p>
				
				Name <input type="text" id="my<?php echo $row->categoryName; ?>" value="<?php echo $row->categoryName; ?>">
				<input type="button" value="click" id="<?php echo $row->categoryName; ?>">
				<br>
				<span id="our<?php echo $row->categoryName; ?>"> </span>
				<br>
				
				
				
				
			</div><!--end .accordion-section-content-->
		</div><!--end .accordion-section-->
	</div><!--end .accordion-->
</div>

<?php
	}
?>
</body>
</html>