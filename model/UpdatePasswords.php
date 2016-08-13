<?php
		require_once('../model/db.php');
		function UpdatePassword($random){
			$database_obj=connectDB();
			$sql="update student set password=concat(RollNo,'_','".$random."')";
			echo $sql;
			$_SESSION['msg']=30;
			$_SESSION['pass']=$random;
			$database_obj->query($sql);
			
		}
?>
