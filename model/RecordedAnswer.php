<?php
error_reporting(0);
session_start();

require_once('../model/db.php');
$database_obj=connectDB();

$sql="delete from result where StudentId=".$_SESSION['studid']." and QuizId=".$_SESSION['quizid'];
echo $sql;
$database_obj->query($sql);
for($i=1;;$i++)
   {
    if(isset($_POST['que'.$i]))
    {
	   if(isset($_POST['ans'.$i]))
	    {
	    $sql="insert into result(StudentId,QuestionId,SelectedAns,QuizId) values ('".$_SESSION['studid']."','".$_POST['que'.$i]."','".$_POST['ans'.$i]."','".$_SESSION['quizid']."')";
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
