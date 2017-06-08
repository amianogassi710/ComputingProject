<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paradise Food Land</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_AdminDashboard.css">
</head>
<body>
<?php include 'public/public_nav.php'; ?>

<div class="container1">
	<h2>Welcome Admin</h2>

	<button class="accordion">Add New</button>
	<div class="panel">
		<a href="<?php echo site_url('Home/addCategory');?>"> Add New Category </a>	<br>
		<a href="<?php echo site_url('Manager/listCategoryAddItem');?>"> Add New Items </a>	<br>
	</div>

	<button class="accordion">Select/View</button>
	<div class="panel">
		<a href="<?php echo site_url('Manager/listCategory');?>"> View All Category </a>	<br>
		<a href="<?php echo site_url('Manager/listItemWithCategory');?>"> Select All Items </a>	<br>
		<a href="<?php echo site_url('Manager/listCustomer');?>"> Registered Customers </a>	<br>
	</div>

	<button class="accordion">Update</button>
	<div class="panel">
		<a href="<?php echo site_url('Manager/listCategoryUpdate');?>"> Update Category </a> <br>
		<a href="<?php echo site_url('Manager/listItemUpdate');?>"> Update Items </a> <br>
	</div>
	
	<button class="accordion">Delete</button>
	<div class="panel">
		<a href="<?php echo site_url('Manager/listCategoryDelete');?>"> Delete Category </a> <br>
		<a href="<?php echo site_url('Manager/listCategoryForDelete');?>"> Delete Items </a> <br>
	</div>
	
	<button class="accordion">Deactivate Customer</button>
	<div class="panel">
		<a href="<?php echo site_url('Home/deactivateCustomer');?>"> Deactivate Customer </a> <br>
	</div>
	
	<button class="accordion">Change Item Status</button>
	<div class="panel">
		<a href="<?php echo site_url('Manager/checkStatus');?>"> Change Item Status </a> <br>
	</div>
	
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>

</body>
</html>
