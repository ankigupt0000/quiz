<?php
	session_start();
	require_once('../model/db.php');
 	function checkStudent($cls, $rollno, $passwd)
	{
		$db_obj=connectDB();
		$sql="Select count(*) as cnt from student where Class='".$cls."' and RollNo='".$rollno."' and password ='".$passwd."';";
		echo $sql;
		foreach($db_obj->query($sql) as $row)
		{
			return $row['cnt'];
		}
		return 0;
	}
	function updateSession($cls, $rollno, $passwd)
	{
		$db_obj=connectDB();
		$sql="Select * from student where Class='".$cls."' and RollNo='".$rollno."' and password ='".$passwd."';";
		foreach($db_obj->query($sql) as $row)
		{
			$_SESSION['studid']=$row['StudentId'];
		}
	}
	function listClasses()
	{
		$db_obj=connectDB();
		$sql="Select distinct Class from student";
		foreach($db_obj->query($sql) as $row)
		{
			echo "<option value='".$row['Class']."'>".$row['Class']."</option>";
		}	
	}
?>
