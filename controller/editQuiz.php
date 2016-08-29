<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/CreateQuiz.php');
	$array=$_REQUEST;
	getQuizInfo($array['id']);
?>
