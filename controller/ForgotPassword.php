<?php
	session_start();
	
	include_once('validator.php');
	include_once('../model/ForgotPassword.php');
	include_once('../model/UserRegistration.php');
	$array=$_REQUEST;
	$_SESSION['forgot_form']=$array;
	$error_code=0;
	if(check_null($array['uname'])){
		$error_code=1;
	}else if(checkUser($array['uname'])==0){
		$error_code=25;
	}else if(check_null($array['sec_ans'])){
		$error_code=15;
	}else if(!checkSecAns($array['uname'],$array['sec_ans'])){
		$error_code=27;
	}
	if($error_code>0){
		$_SESSION['forgot_form']['m']=$error_code;
		header('location: ../view/ForgotPassword.php');
	}else{
		/*$email_to=getEmail($array['uname']);
		$email_sub="Password Changed";
		$email_body="Hello ".$array['uname'].", your new password is ".changePassword($array['uname']);
		mail($email_to,$email_sub,$email_body);*/
		changePassword($array['uname']);
		$_SESSION['forgot_form']['m']=28;
		header('location: ../view/ForgotPassword.php');
	}
?>

