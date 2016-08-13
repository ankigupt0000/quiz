<?php
	session_start();
	
	include_once('validator.php');
	include_once('../model/UserRegistration.php');
	
	$array=$_REQUEST;
	$_SESSION['reg_form']=$array;
	if(check_null($array['uname'])){
		$error_code=1;
	}
	else if(strlen($array['uname'])<6 || !preg_match("/^[a-zA-Z0-9_]{6,50}$/",$array['uname'])){
		$error_code=16;
	}
	else if(checkUser($array['uname'])==1){
		$error_code=19;
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
	else if(check_null($array['fname'])){
		$error_code=6;
	}
	else if(!preg_match("/^[a-zA-Z]{1,50}$/",$array['fname'])){
		$error_code=17;
	}
	else if(check_null($array['lname'])){
		$error_code=7;
	}
	else if(!preg_match("/^[a-zA-Z]{1,50}$/",$array['lname'])){
		$error_code=18;
	}
	else if(check_null($array['email'])){
		$error_code=8;
	}
	else if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$array['email'])){
		$error_code=9;
	}
	else if(!checkdate($array['month'],$array['date'],$array['year'])){
		$error_code=10;
	}
	else if(checkage($array['month'],$array['date'],$array['year'])<18){
		$error_code=11;
	}
	else if(strlen($array['phone'])<10 || !is_numeric($array['phone'])){
		$error_code=13;
	}
	else if($array['sec_question']==3 && check_null($array['other_ques'])){
		$error_code=14;
	}
	else if(check_null($array['sec_ans'])){
		$error_code=15;
	}	
	if($error_code>0){
		$_SESSION['reg_form']['m']=$error_code;
		header('location: ../view/UserRegistration.php');
	}
	else{
		$dob=$array['year']."-".$array['month']."-".$array['date'];
		$sec_ques=array('What is your first school name?','What is your favourite movie','What is your first teacher name');
		$insert_ques="";
		if($array['sec_question']<3){
			$insert_ques=$sec_ques[$array['sec_question']];
		}else{
			$insert_ques=$array['other_ques'];
		}
		insertUser($array['uname'],$array['passwd'],$array['fname'],$array['lname'],$insert_ques,$array['sec_ans'],$array['email'],$array['phone'],$dob);
		$_SESSION['user_name']=$array['uname'];
		unset($_SESSION['reg_form']);
		header('location: ../view/index.php');
	}
?>
