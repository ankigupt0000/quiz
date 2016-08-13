<?php
		require_once('../model/db.php');
		function checkUser($username){
			$database_obj=connectDB();
			$exist=0;
			$sql="SELECT count(*) as exist from admin where UserName='".$username."'";
			foreach ($database_obj->query($sql) as $row) {
	  			$exist=$row['exist'];
			}
			return $exist;
		}
		function insertUser($username,$password,$fname,$lname,$sec_ques,$sec_ans,$email,$phone,$dob){
			$database_obj=connectDB();
			$sql="CALL sp_insert_user('".mysql_real_escape_string($username)."','".mysql_real_escape_string($password)."','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($sec_ques)."','".mysql_real_escape_string($sec_ans)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($phone)."','".mysql_real_escape_string($dob)."')";
			$database_obj->query($sql);
		}
?>
