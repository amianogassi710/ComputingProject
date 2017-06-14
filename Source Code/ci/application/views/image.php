<?php
	foreach ($record as $row){
?>
	<img src="<?php echo base_url();?>assets/images/<?php echo $row->itemImage; ?>" height="500" width="500">;
<?php
}
?>