<?php
require_once('../model/db.php');
function associateQues($name,$quesid)
{
	$database_obj=connectDB();
	$sql="insert into CareerQues values ('".$name."','".$quesid."');";
	$database_obj->query($sql);
}
function deleteQues($name)
{
	$database_obj=connectDB();
	$sql="delete from CareerQues where CareerName='".$name."';";
	$database_obj->query($sql);
}
?>
