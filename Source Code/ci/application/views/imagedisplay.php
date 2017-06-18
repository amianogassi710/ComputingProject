<?php
if($image->num_rows > 0){
	foreach($image->result() as $row){
		echo $row->filepath;
	}
}else{
echo "no image";
	
}
?>