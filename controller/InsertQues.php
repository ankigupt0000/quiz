<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/InsertQues.php');
	
	$array=$_REQUEST;
	if ( !isset($_SESSION['image_id']))
		$_SESSION['image_id']=0;
	if ( !isset($_SESSION['opt1_id']))
		$_SESSION['opt1_id']=0;
	if ( !isset($_SESSION['opt2_id']))
		$_SESSION['opt2_id']=0;
	if ( !isset($_SESSION['opt3_id']))
		$_SESSION['opt3_id']=0;
	if ( !isset($_SESSION['opt4_id']))
		$_SESSION['opt4_id']=0;
	if ( !isset($_SESSION['opt5_id']))
		$_SESSION['opt5_id']=0;
	insertQues($array['ques'],$array['option1'],$array['option2'],$array['option3'],$array['option4'],$array['option5'],$array['Ans'],$_SESSION['image_id'],$_SESSION['opt1_id'],$_SESSION['opt2_id'],$_SESSION['opt3_id'],$_SESSION['opt4_id'],$_SESSION['opt5_id'],$array['Category']);
	header('location: ../view/InsertQues.php');
?>
