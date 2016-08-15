<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/AddCategory.php');
	
	$array=$_REQUEST;
	addCategory($array['name']);
	header('location: ../view/addCategory.php');
?>