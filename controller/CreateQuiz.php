<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/CreateQuiz.php');
	
	$array=$_REQUEST;
	if(!isset($array['qid']))
	{
		CreateQuiz($array['name'],$array['desc'],$array['duration']);
		header('location: ../view/CreateQuiz.php');
	}
	else
	{
		updateQuiz($array['qid'],$array['name'],$array['desc'],$array['duration']);
		header('location: ../view/editQuiz.php');
	}
?>
