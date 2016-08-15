<?php
		require_once('../model/db.php');
		function addCategory($name){
			$database_obj=connectDB();
			$sql="insert into category values ('".mysql_real_escape_string($name)."');";
			echo $sql;
			$_SESSION['msg']=33;
			$database_obj->query($sql);
		}
?>
