<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/UpdatePasswords.php');
	
	$array=$_REQUEST;
	$random=rand(10000000,99999999);
	UpdatePassword($random);
	header('location: ../view/UpdatePasswords.php');
?>
