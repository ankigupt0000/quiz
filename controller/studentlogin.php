<?php
	session_start();
	include_once('../model/studentlogin.php');
	$cls=$_REQUEST['cls'];
	$rollno=$_REQUEST['rollno'];
	$password=$_REQUEST['passwd'];
	updateSession($rollno,$password);
	if(checkStudent($rollno, $password)==1)
	{
		header('Location: ../view/QuestionShow.php');
	}
	else
	{
		$_SESSION['msg']=3;
		header('location: ../view/studentlogin.php');
	}
?>
