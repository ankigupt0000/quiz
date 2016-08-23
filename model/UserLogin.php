<?php
	include_once('../model/db.php');
	function checkUser($username,$password){
		$database_obj=connectDB();
		$exist=0;
		echo $username, $password;
		$stmt=$database_obj->prepare("SELECT count(*) as exist from admin where UserName=:username and Passwd=:password");
		$stmt->execute(array('username' => $username, 'password' => $password ));
		foreach ($stmt as $row) {
	  		$exist=$row['exist'];
		}
		return $exist;
	}
?>
