<?php
	include_once('../model/db.php');
	function checkUser($username,$password){
		$database_obj=connectDB();
		$exist=0;
		echo $username, $password;
		$sql="SELECT count(*) as exist from admin where UserName='".$username."' and Passwd='".$password."'";
		echo $sql;
		foreach ($database_obj->query($sql) as $row) {
	  		$exist=$row['exist'];
		}
		return $exist;
	}
?>
