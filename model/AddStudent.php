<?php
		require_once('../model/db.php');
		function AddStudent($sname,$sclass,$srollno){
			$database_obj=connectDB();
			$sql="insert into student(Name,Class,RollNo) values ('".$sname."','".$sclass."','".$srollno."');";
			//echo $sql;
			$_SESSION['msg']=29;
			$database_obj->query($sql);
		}
?>
