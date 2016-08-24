<?php
		require_once('../model/db.php');
		function CreateQuiz($name,$desc,$duration){
			$database_obj=connectDB();
			$sql="insert into quiz(QuizName,Description,duration) values ('".$name."','".$desc."',".$duration.");";
			echo $sql;
			$_SESSION['msg']=32;
			$database_obj->query($sql);
		}
?>
