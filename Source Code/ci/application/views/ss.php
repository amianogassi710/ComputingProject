<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
</head>
<body>
<script>
	$(document).ready(function(){
    $("#aman").click(function(){
        alert ('xx');
		var fullname=$('#fullname').val();
		alert (fullname);
		$.ajax({
			type:'POST',
			data:{fullname: fullname},
			url:'<?php echo site_url('Manager/hello'); ?>',
			success: function(result){
				$('#result1').html(result);
			}
		});
    });
});	
$(document).ready(function(){
    $("#amans").click(function(){
        alert ('xx');
		var fullname=$('#fullname1').val();
		alert (fullname);
		$.ajax({
			type:'POST',
			data:{fullname: fullname},
			url:'<?php echo site_url('Manager/hello'); ?>',
			success: function(result){
				$('#result1').html(result);
			}
		});
    });
});
</script> 
Name <input type="text" id="fullname">
<input type="button" value="click" id="aman">
<br>
Name <input type="text" id="fullname1">
<input type="button" value="click" id="amans">
<br>


</body>
</html>
