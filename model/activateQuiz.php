<?php
	require_once('../model/db.php');
	function activateQuiz($quizid)
	{
		$database_obj=connectDB();
		$sql="update quiz set Active=0";
		$database_obj->query($sql);
		$sql="update quiz set Active=1 where QuizId=".$quizid;
		$database_obj->query($sql);
	}
	function getQuizName()
	{
		$database_obj=connectDB();
		$sql="select QuizName from quiz where Active=1";
		foreach($database_obj->query($sql) as $row)
		{
			return $row['QuizName'];
		}
	}
?>
