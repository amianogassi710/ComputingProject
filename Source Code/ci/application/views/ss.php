<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        alert ('aa');
    });
});


</script>

<script>
	function fun1(){
    	alert ('bb');
    }
</script>

<script>
	$(document).ready(function(){
    $("#buttons").click(function(){
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
</script>
</head>
<body>

<p>This is a paragraph.</p>

<button>Toggle between slide up and slide down for a p d</button>

<br>
<input type="button" value="click" onclick="fun1();">

Name <input type="text" id="fullname">
<input type="button" value="click" id="buttons">
<br>
<span id="result1"> </span>


</body>
</html>
