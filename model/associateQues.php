<?php
require_once('../model/db.php');
function associateQues($quizid,$quesid)
{
	$database_obj=connectDB();
	$sql="insert into quizquestion values ('".$quizid."','".$quesid."');";
	$database_obj->query($sql);
}
function deleteQues($quizid)
{
	$database_obj=connectDB();
	$sql="delete from quizquestion where QuizId=".$quizid;
	$database_obj->query($sql);
}
?>