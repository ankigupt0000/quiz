<?php
	session_start();
	include_once('../model/studentlogin.php');
	$cls=mysql_real_escape_string($_REQUEST['cls']);
	$rollno=mysql_real_escape_string($_REQUEST['rollno']);
	$password=mysql_real_escape_string($_REQUEST['passwd']);
	updateSession($cls,$rollno,$password);
	if(checkStudent($cls, $rollno, $password)==1)
	{
		header('location: ../view/SelectCareer.php');
	}
	else
	{
		$_SESSION['msg']=3;
		header('location: ../view/studentlogin.php');
	}
?>
