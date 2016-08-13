<?php
	session_start();
	
	include_once('validator.php');
	include_once('../model/ChangePassword.php');
	include_once('../model/UserLogin.php');
	$array=$_REQUEST;
	$_SESSION['pwd_form']=$array;
	$error_code=0;
	if(check_null($array['old_passwd'])){
		$error_code=22;
	}
	else if(!checkUser($_SESSION['user_name'],$array['old_passwd'])){
		$error_code=23;
	}
	else if(check_null($array['passwd'])){
		$error_code=2;
	}
	else if(strlen($array['passwd'])<8 || preg_match("/^[a-zA-Z0-9]{8,200}$/",$array['passwd'])){
		$error_code=20;
	}
	else if(check_null($array['conf_passwd'])){
		$error_code=4;
	}
	else if($array['passwd']!=$array['conf_passwd']){
		$error_code=5;
	}
	if($error_code>0){
		$_SESSION['pwd_form']['m']=$error_code;
		header('location: ../view/ChangePassword.php');
	}
	else{
		changePasswd($_SESSION['user_name'],$array['old_passwd'],$array['passwd']);
		$_SESSION['pwd_form']['m']=24;
		header('location: ../view/ChangePassword.php');
	}
?>
