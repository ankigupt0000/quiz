<?php
		require_once('../model/db.php');
		function CreateQuiz($name,$desc){
			$database_obj=connectDB();
			$sql="insert into quiz(QuizName,Description) values ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($desc)."');";
			echo $sql;
			$_SESSION['msg']=32;
			$database_obj->query($sql);
		}
?>
