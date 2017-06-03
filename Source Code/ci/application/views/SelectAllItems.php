<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_selectCategory.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/defaults.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/demo.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/accordion.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.1.4.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#bttHello').click(function(){
			alert ('test');
		}
		});
	});
</script>
</head>

<body>
<br><br><br>
Name <input type="text" id="fullname">
<input type="button" value="Hello" id="bttHello">
<br>
<span id="result1"> </span>


<script>
	function fun1(clicked_id){
	var a=clicked_id;
	alert(a);
	}
	
	function fun2(){
	
	var a=prompt("Please enter your name??","");
	alert("Hello " + a);
	}
	
</script>

<p onClick="fun2();">CLick Here </p>
<form>
	<input type="text" id="name" >
	<input type="button" value="submit" onClick="post();">
</form>
<script type="text/javascript">
	function post(){
		var name=$('#name');
		alert (name);
	}
</script>


<?php
for ($i=0;$i<5;$i++){
?>
    <a href="#"  id="testing_<?php echo $i;?>" class="testing" data-index="<?php echo $i;?>">testlink</a>
<?php
}
?>

<script>
$('.testing').click(function() {

    $.ajax({
        url : "http://localhost/ci/Manager/searchItembyCategoryID/",
        data: {
            id: $(this).data("index")
        },
        type: "POST"
        success: function(data, textStatus, jqXHR)
        {
            console.log('success');
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          console.log('we are in error');
        }
    });
</script>
<?php 
	$i=1;
	foreach($record as $row){ 
?>






<a href="" id="anchortag">Click me t</a>


<script>

var $rowCount=0;
function invest() {
  $rowCount=$('#ulinvestment').find('.rowInvestment').length;
}
$('#anchortag').prop('href', "/ci/Manager/searchItembyCategoryID/");
</script>
<div class="main">
		<div class="accordion">
			<div class="accordion-section">
				<p onClick="fun1(this.id);" id="<?php echo $row->categoryName; ?>" > <a class="accordion-section-title" href="#<?php echo $row->categoryName; ?>"><?php echo $row->categoryName; ?></a> </p>
				<div id="<?php echo $row->categoryName; ?>" class="accordion-section-content">
					<p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae. <br> </p>
				
	
		
					<?php
						foreach($records as $row){ 
							// echo "<a href='".$row['itemName']."'>".$row['itemName']."<br>"."</a>"; // Write an anchor with the url as href, and text as value/content
						 ?>
						 
						<a href="#"> <?php echo $row->itemName; ?> </a> <br>
						
					<?php
					}
					?>
				
				</div><!--end .accordion-section-content-->
			</div><!--end .accordion-section-->
		</div><!--end .accordion-->
</div>

			<?php } ?>
</body>
</html>