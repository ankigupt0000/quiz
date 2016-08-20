<?php
		require_once('../model/db.php');
		function addCategory($name){
			$database_obj=connectDB();
			$sql="insert into category(CatName) values ('".$name."');";
			echo $sql;
			$_SESSION['msg']=33;
			$database_obj->query($sql);
		}
?>
