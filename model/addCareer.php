<?php
		require_once('../model/db.php');
		function addCareer($name){
			$database_obj=connectDB();
			$sql="insert into CareerList values ('".$name."');";
			echo $sql;
			$_SESSION['msg']=33;
			$database_obj->query($sql);
		}
?>
