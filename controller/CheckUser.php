<?php
	include_once('validator.php');
	include_once('../model/UserRegistration.php');
	include_once('../conf/messages.inc.php');
	$array=$_REQUEST;
	$error_code=0;
	if(checkUser($array['uname'])==1){
		$error_code=19;
	}
	else{
		$error_code=26;
	}
	echo $msg[$error_code];	
?>

