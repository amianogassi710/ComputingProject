<html>
<head>
<!--javascript-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js';?>"></script>

<script>

function fun1(){
	var a=prompt("Please enter your xamma name??","");
	alert("Hello " + a);
	$.ajax({
		type:'POST',
		data:{fullname: a},
		url:'<?php echo site_url('Manager/searchItembyCategoryID/'); ?>',
		success:function(result){
			$('result1').html(result);
		}
	})
}



</script>
</head>
<title> Java Script </title>
<body>

	<h2 ondblclick="fun1()"> Double Click Here </h2>
	<p onclick="fun1()"> Click Here</p>
	
	<form name="frm1">
		Username: <input type="text" name="uname" id="fullname">
		<input type="button" name="button1">
	
	</form>
<span id="result1"></span>	
	<br>

	
</body>
</html>