<?php
    error_reporting(0);
    session_start();
    require_once('../model/db.php');
	$database_obj=connectDB();
?>
<html>
<head>

<style type="text/css">
table
{
	dispaly:inline-blocked;
	positioin:absolute;
	margin-left: 25%; 
    margin-top: 10%;
    width: 600px;
	text-align:center;
}
#title
{
	font-size:40px;
	margin-top:20px;
	font-weight:bold;
	display:inline-blocked;
	margin-left:35%;
}
</style>
</head>
<body>


<?php		
echo "<div id='title'>CAREER PRIORITY</div>";
echo "<table border='1'>
                  <tr> 
				  <th>Career</th>
                  <th>Obtained Marks</th>
                  <th>Total Marks</th>
				  <th>Absolute Priority</th>
				  <th>Percentage</th>
				  <th>Relative Priority</th>
                  </tr>";
		$quizid=$_SESSION['quizid'];
		$studid=$_SESSION['studid'];
		$career1=$_SESSION['Career1'];
		$career2=$_SESSION['career2'];
		$career3=$_SESSION['career3'];
		$high="High-Priority";
		$avg="Average-Priority";
		$low="Low-Priority";
		$none="-";
		
		$counter=0;
	    $max1=0.0;	
		$marks1=0.0;
		$lastCareerName='';
		$sql0="SELECT quizquestion.QuizId qid, CareerName, QueId, CatId, Ans
		FROM quizquestion, questionbase, CareerQues
		WHERE quizquestion.QuestionId = questionbase.QueId
		AND quizquestion.QuizId =$quizid
		and CareerQues.QuestionId=questionbase.QueId
		order by CareerName";
		foreach($database_obj->query($sql0) as $row0)
		{
			if($lastCareerName != $row0['CareerName'] and $lastCareerName != '')
			{
			
			     if($lastCareerName == $career1 or $lastCareerName==$career2  or $lastCareerName==$career3)
			     {
				  $marks1+=(float)$marks1*0.1;
				  $selected=1;
				 }
			     else
                 {
				  $selected=0;
				 }			
				$percent=($marks1/$max1)*100;
				
								
				if($percent >= 65)
				{
				$prior=$high;
				}
				else if($percent >= 50)
				
				{
				$prior=$avg;
				}
				else if($percent >=35)
				{
				$prior=$low;
				}
				else
				{
				$prior=$low;
				}
				
				
				
				$sql2="insert into careerresult(studid,career,careerselected,quizid,obtmarks,totalmarks,priority,percent) values ('".mysql_real_escape_string($studid)."','".mysql_real_escape_string($lastCareerName)."','".mysql_real_escape_string($selected)."','".mysql_real_escape_string($quizid)."','".mysql_real_escape_string($marks1)."','".mysql_real_escape_string($max1)."','".mysql_real_escape_string($prior)."','".mysql_real_escape_string($percent)."');";
				$database_obj->query($sql2);
				$lastCareerName=$row0['CareerName'];			
				$marks1=0.0;
				$max1=0.0;
			 }
			   if($lastCareerName=='')
			    {
				$lastCareerName=$row0['CareerName'];
			    }
			   $ans=0.0;
			   $correct=0.0;
			   $sql1="select * from result where result.QuizId=".$quizid." and result.QuestionId=".$row0['QueId']." and result.StudentId=".$studid;
			   foreach($database_obj->query($sql1) as $row1)
			    {					
				$correct=0;	
				$ans=$row1['SelectedAns'];
				if($row1['SelectedAns']==$row0['Ans'])
				{
					$correct=1;	
				}
				switch($row0['CatId'])
				{
				case 1:
					$max1=$max1+1.0;
					if($ans!=0)
					{
						if($ans==1)
						{
							$marks1+=(float)1.0;
						}
						else if($ans==2)
						{
							$marks1+=(float)0.8;
						}
						else if($ans==3)
						{
							$marks1+=(float)0.6;
						}
						else if($ans==4)
							$marks1+=(float)0.4;
						else if($ans==5)
							$marks1+=(float)0.2;
					}
					
					break;
				default:
					$max1=$max1+2;
					if($correct==1)
					{
						$marks1+=2.0;
					}
					break;	
				}
		    }
		}
				
				if($lastCareerName == $career1 or $lastCareerName==$career2  or $lastCareerName==$career3)
			     {
				  $marks1+=(float)$marks1*0.1;
				  $selected=1;
				 }
			else
                {
				  $selected=0;
				}	
				$percent=($marks1/$max1)*100;
				if($percent >= 65)
				{
				$prior=$high;
				}
				else if($percent >= 50)
				
				{
				$prior=$avg;
				}
				else if($percent >=35)
				{
				$prior=$low;
				}
				else
				{
				$prior=$low;
				}
				
				$sql2="insert into careerresult(studid,career,careerselected,quizid,obtmarks,totalmarks,priority,percent) values ('".mysql_real_escape_string($studid)."','".mysql_real_escape_string($lastCareerName)."','".mysql_real_escape_string($selected)."','".mysql_real_escape_string($quizid)."','".mysql_real_escape_string($marks1)."','".mysql_real_escape_string($max1)."','".mysql_real_escape_string($prior)."','".mysql_real_escape_string($percent)."');";
				$database_obj->query($sql2);
				
		
	$sql1="select * from careerresult where careerresult.QuizId=".$quizid." and careerresult.StudId=".$studid." order by careerresult.percent desc";
	foreach($database_obj->query($sql1) as $row1)
		{
		        echo "<tr>";
				echo "<td>" . $row1['career'] ."</td>";
				echo "<td>" . $row1['obtmarks']."</td>";
                echo "<td>" . $row1['totalmarks']."</td>";
				echo "<td>" .$row1['priority']."</td>";
				echo "<td>" .$row1['percent']."</td>";
				if($counter < 5)
				{
				echo "<td>" .$high. "</td>";
				}
				else if($counter >= 5 and $counter<12)
				{
				echo "<td>" .$avg. "</td>";
				}
				else if($counter >=12)
				{
				echo "<td>" .$low. "</td>";
				}
				$counter=$counter+1;
				echo "</tr>";
		}
	echo "</table>";
	
?>


</body>
</html>