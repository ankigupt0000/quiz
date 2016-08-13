<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/AddStudent.php');
	
	$array=$_REQUEST;
	AddStudent($array['SName'],$array['SClass'],$array['SRollNo']);
	header('location: ../view/AddStudent.php');
?>
