<?php
		require_once('../model/db.php');
		function CreateQuiz($name,$desc,$duration){
			$database_obj=connectDB();
			$sql="insert into quiz(QuizName,Description,duration) values ('".$name."','".$desc."',".$duration.");";
			//echo $sql;
			$_SESSION['msg']=35;
			$database_obj->query($sql);
		}
		function updateQuiz($qid,$name,$desc,$duration){
			$database_obj=connectDB();
			$sql="update quiz set Description='".$desc."', duration='".$duration."', QuizName='".$name."' where QuizId='".$qid."'";
			$database_obj->query($sql);
			$_SESSION['msg']=34;
			echo $sql;
			$_SESSION['qid']=$qid;
			$_SESSION['qname']=$name;
			$_SESSION['desc']=$desc;
			$_SESSION['duration']=$duration;
			
		}
		function getQuizInfo($id)
		{
			$database_obj=connectDB();
			$sql="select QuizId,QuizName,Duration,Description from quiz where QuizId=".$id;
			foreach($database_obj->query($sql) as $row )
			{
				$_SESSION['qid']=$row['QuizId'];
				$_SESSION['qname']=$row['QuizName'];
				$_SESSION['desc']=$row['Description'];
				$_SESSION['duration']=$row['Duration'];
			}
		}	
?>
