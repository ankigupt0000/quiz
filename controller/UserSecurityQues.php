<?php
	session_start();	
	include_once('validator.php');
	include_once('../model/UserSecurityQues.php');
	$array=$_REQUEST;
	$_SESSION['upd_form']=$array;
	$error_code=0;
	if(check_null($array['SecurityQue'])){
		$error_code=14;
	}
	else if(check_null($array['SecurityAns'])){
		$error_code=15;
	}	
	if($error_code>0){
		$_SESSION['upd_form']['m']=$error_code;
		header('location: ../view/UserSecurityQues.php');
	}
	else{
		updateUser($array['SecurityQue'],$array['SecurityAns']);
		$_SESSION['upd_form']['m']=21;
		header('location: ../view/UserSecurityQues.php');
	}
?>
