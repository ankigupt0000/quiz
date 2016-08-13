<?php
		error_reporting(E_ALL);
		require_once('../model/db.php');
		function updateUser($sec_ques,$sec_ans){
			$database_obj=connectDB();
				$sql="update admin set SecurityQue='".$sec_ques."' , SecurityAns='".$sec_ans."' where UserName='".$_SESSION['user_name']."'";
				$database_obj->query($sql);
		}
		function getUserData(){
			$database_obj=connectDB();
			if(isset($_SESSION['user_name'])){
				$sql="select SecurityQue, SecurityAns from admin where UserName='".$_SESSION['user_name']."'";
				foreach($database_obj->query($sql) as $row){
					$_SESSION['upd_form_db']=$row;
				}
			}
		}
?>
