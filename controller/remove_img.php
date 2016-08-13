<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/remove_img.php');
	
	$array=$_REQUEST;
	
	removeImg($_SESSION[$_REQUEST['id']]);
	unset($_SESSION[$_REQUEST['id']]);
?>
