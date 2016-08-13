<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/addCareer.php');
	
	$array=$_REQUEST;
	addCareer($array['name']);
	header('location: ../view/addCareer.php');
?>
