<?php
    //error_reporting(0);
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
	font-weight:bold;
	display:inline-blocked;
	position:absolute;
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
				  <th>Priority</th>
                  </tr>";
				  
				  
				  
$sql0="SELECT * from careerresult where StudId='".$_SESSION['studid']."' and QuizId='".$_SESSION['quizid']."'";
//echo $sql0;

		foreach($database_obj->query($sql0) as $row0)
		{
		
	            //echo $row0['Career'];	
		        echo "<tr>";
				echo "<td>" .$row0['career']. "</td>";
				
                echo "<td>"  .$row0['obtmarks']. "</td>";
                echo "<td>"  .$row0['totalmarks']. "</td>";
				echo "<td>"  .$row0['priority']. "</td>";
				echo "<br/>";
				
                echo "</tr>";
	    }	
echo "</table>";		
?>
</body>
</html>