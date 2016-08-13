<?php
include_once('../model/db.php');
function showCareer()
{
	$sql="Select * from careerlist";
	$db_obj=connectDB();
	foreach($db_obj->query($sql) as $row)
	{
		echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
	}
}
?>
