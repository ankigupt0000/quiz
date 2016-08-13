<?php
require_once('../model/db.php');
function associateQues($name,$quesid)
{
	$database_obj=connectDB();
	$sql="insert into CareerQues values ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($quesid)."');";
	$database_obj->query($sql);
}
function deleteQues($name)
{
	$database_obj=connectDB();
	$sql="delete from CareerQues where CareerName='".mysql_real_escape_string($name)."';";
	$database_obj->query($sql);
}
?>
