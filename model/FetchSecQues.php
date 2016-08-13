<?php
	include_once('../model/db.php');
	function getSecurityQues($username){
		$database_obj=connectDB();
		$sec_ques="";
		$sql="select SecurityQue as sec_ques from admin where UserName='".$username."'";
		foreach ($database_obj->query($sql) as $row) {
  			$sec_ques=$row['sec_ques'];
		}
		return $sec_ques;
	}
?>
