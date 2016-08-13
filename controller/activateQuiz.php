<?php
	session_start();
	require_once('../model/activateQuiz.php');
	$quizid=$_REQUEST['active'];
	activateQuiz($quizid);
	$_SESSION['msg']=32;
	$_SESSION['qname']=getQuizName($quizid);
	header('location: ../view/activateQuiz.php');
?>
