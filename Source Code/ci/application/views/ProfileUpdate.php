<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Profile</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_updateProfile.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<?php include 'public/public_nav.php'; ?>
<div class="container1">
		<h1> Update Profile </h1>
			<a href="<?php echo base_url();?>Customer/viewItem"> 
				<img src="<?php echo base_url();?>assets/images/back.png" style="margin-left: -415px;" />
			</a>

<?php
	foreach($profile as $row){
?>
	<form action="<?php echo base_url();?>Customer/updateCustomerDetails" method="post">

	<table>
		<tr>
			<td> <input type="hidden" name="customerID" value="<?php echo $row->customerID; ?>"> </td> 
		</tr> 
		<tr> 
			<td> <label for="firstName"> First Name </label> </td> 
			<td> <input type="text" name="firstName" value="<?php echo $row->customerFirstName;?> "> </td> 
		</tr> 
		<tr> 
			<td> <label for="firstName"> Last Name </label> </td> 
			<td> <input type="text" name="lastName" value="<?php echo $row->customerLastName;?>"> </td>
		</tr>
		<tr>
			<td> <label for="firstName"> Email </label> </td> 
			<td> <input type="email" name="email" value="<?php echo $row->email; ?>"> </td> 
		</tr>
		<tr>
			<td> <label for="firstName"> Username </label> </td> 
			<td> <input type="text" name="username" value="<?php echo $row->username; ?>"> </td> 
		</tr>
		<tr>
			<td> <label for="mobileNumber"> Mobile Number </label> </td> 
			<td> <input type="text" name="mobileNumber" value="<?php echo $row->mobileNumber; ?>"> </td> 
		</tr>
		<tr>
			<td> <label for="firstName"> District </label> </td> 
			<td>
		<div class="styled-select">
		<?php
			$checkAddress= $row->district;
		?>
		<?php if ($checkAddress=="Bhaktapur"){ ?>
		<select name="district">
			<option value="Bhaktapur"> Bhaktapur </option>
			<option value="Kathmandu"> Kathmandu </option>
			<option value="Lalitpur"> Lalitpur </option>
		</select>
		<?php } ?>
		<?php if ($checkAddress=="Lalitpur"){ ?>
		<select name="district">
			<option value="Lalitpur"> Lalitpur </option>
			<option value="Bhaktapur"> Bhaktapur </option>
			<option value="Kathmandu"> Kathmandu </option>
		<select>
		<?php } ?>
		<?php if ($checkAddress=="Kathmandu"){ ?>
		<select name="district">
			<option value="Kathmandu"> Kathmandu </option>
			<option value="Bhaktapur"> Bhaktapur </option>
			<option value="Lalitpur"> Lalitpur </option>
		<select>
		<?php } ?>
		</div>
		</td>
		</tr>
		<tr> 
			<td> <label for="street"> Street </label> </td> 
			<td> <input type="text" name="street" value="<?php echo $row->street; ?>"> </td>
		</tr>
		
		<tr>
			<td> </td>
			<td> <button type="submit" name="add" class="btn btn-info"> UPDATE </button> </td>
		</tr>
	</form>	
	
<?php	
	}
?>	

</div>
</body>
</html>