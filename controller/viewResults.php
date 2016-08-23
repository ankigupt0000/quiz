<?php
	error_reporting(0);
	session_start();
	include_once('../model/studentlogin.php');
	//require_once('../model/db.php');
	function findStudent($cls, $rollno)
	{
		$db_obj=connectDB();
		$sql="Select * from student where RollNo='".$rollno."';";
		//echo $sql;
		foreach($db_obj->query($sql) as $row)
		{
			return $row['StudentId'];
		}
		return 0;
	}
	
	$cls=$_REQUEST['cls'];
	//echo $cls;
	//echo "</br>";
	$rollno=$_REQUEST['rollno'];
	//echo $rollno;
	//echo "</br>";
	//$studentid=findStudent($cls, $rollno);;
	//echo $studentid;
	echo "</br>";
	$_SESSION['studid']=findStudent($cls, $rollno);
	$_SESSION['quizid']=$_REQUEST['quizid'];
	//echo $_SESSION['studid'];
	//echo "<br/>".$_SESSION['quizid'];
	header('location: ../view/DisplayResult.php');
?>
