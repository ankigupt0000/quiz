<?php
	session_start();
	include_once('validator.php');
	include_once('../model/UserLogin.php');
	$array=array('uname'=>$_REQUEST['uname'],'passwd'=>$_REQUEST['passwd']);
	$_SESSION['login_form']=$array;
	$_SESSION['login_form']['m']=0;
	if(check_null($array['uname'])){
		$_SESSION['login_form']['m']=1;
	}
	else if(check_null($array['passwd'])){
		$_SESSION['login_form']['m']=2;
	}
	else if(checkUser($array['uname'],$array['passwd'])==0){
		$_SESSION['login_form']['m']=3;
	}
	if($_SESSION['login_form']['m']>0){
		header('location: ../view/UserLogin.php');
	}
	else{
		$_SESSION['user_name']=$array['uname'];
		unset($_SESSION['login_form']['passwd']);
		header('location: ../view/Welcome.php');
	}
?>
