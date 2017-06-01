<table border="1">
<tr> <th> Name </th> </tr>
<?php
	//echo $notice;
	//echo $modelmsg;
	foreach($datas->result() as $mydata){
?>

<tr> 
	<td> <?php echo $mydata->name;?> </td>
</tr>

<?php
	}
?>

</table>