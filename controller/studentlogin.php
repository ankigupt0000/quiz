<?php
	session_start();
	include_once('../model/studentlogin.php');
	$cls=mysql_real_escape_string($_REQUEST['cls']);
	$rollno=mysql_real_escape_string($_REQUEST['rollno']);
	$password=mysql_real_escape_string($_REQUEST['passwd']);
	updateSession($rollno,$password);
	if(checkStudent($rollno, $password)==1)
	{
		header('Location: ../view/Instructions.php');
	}
	else
	{
		$_SESSION['msg']=3;
		header('location: ../view/studentlogin.php');
	}
?>
