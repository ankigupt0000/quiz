<?php
error_reporting(0);
session_start();

require_once('../model/db.php');
$database_obj=connectDB();

$sql="delete from result where StudentId=".mysql_real_escape_string($_SESSION['studid'])." and QuizId=".mysql_real_escape_string($_SESSION['quizid']);
echo $sql;
$database_obj->query($sql);
for($i=1;;$i++)
   {
    if(isset($_POST['que'.$i]))
    {
	   if(isset($_POST['ans'.$i]))
	    {
	    $sql="insert into result(StudentId,QuestionId,SelectedAns,QuizId) values ('".mysql_real_escape_string($_SESSION['studid'])."','".mysql_real_escape_string($_POST['que'.$i])."','".mysql_real_escape_string($_POST['ans'.$i])."','".mysql_real_escape_string($_SESSION['quizid'])."')";
	    $database_obj->query($sql);
	    }
	
	header('location: ../view/DisplayResult.php');
    }
 
   else
   {
    break;
   } 
 
 }

?>
