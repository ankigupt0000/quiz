<?php
	session_start();
	include_once('../model/db.php');
	function checkSecAns($username,$sec_ans){
		$database_obj=connectDB();
		$l_sec_ans=0;
		$sql='SELECT count(*) AS count FROM admin WHERE SecurityAns="'.mysql_real_escape_string($sec_ans).'" and UserName="'.mysql_real_escape_string($username).'";';
		foreach ($database_obj->query($sql) as $row) {
	  		$l_sec_ans=$row['count'];
		}
		return $l_sec_ans;
	}
	function getEmail($username){
		$database_obj=connectDB();
		$l_email=0;
		$sql="SELECT email FROM users WHERE username='".mysql_real_escape_string($username)."';";
		foreach ($database_obj->query($sql) as $row) {
	  		$l_email=$row['email'];
		}
		return $l_email;
	}
	function changePassword($username){
		$database_obj=connectDB();
		$password=generateRandomString(8);
		$sql="Update admin set Passwd='".$password."' where UserName='".$username."'";
		$database_obj->query($sql);
		$_SESSION['pass']=$password;
	}
	function generateRandomString($length = 10) {
 		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		return $randomString;
	}
?>
