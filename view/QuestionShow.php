<?php include_once("CheckStudentLogin.php"); ?>
<head>
<style media = "screen" type="text/css">
fieldset
{
    display: inline-block;
    position:relative;
    left:16%;
	width:70%;
	border-style:solid;
    border-color:green;

}
.submit
{
	position:relative;
	left:48%;
}

body
{
	//background-image:url('./css/current/good.jpg');
	background-repeat:repeat;
	background-size:100%;
	background-color:#BDCDCA;
	
}
#typelink {
	position:absolute;
	left:30%;
}
.header {
	font-size:30;
	float:left;
}
.header_right {
	font-size:30;
	float:right;
}
.fix {
	position:fixed;
	//background-color:white;
}
</style>
<script type="text/javascript" src="js/ajax.js" ></script>
<script type='text/javascript'>
	function confirmSubmit()
	{
		return window.confirm("Are you sure you want to submit the quiz?");
	}
</script >
<script type='text/javascript'>
var start=<?php if(isset($_SESSION['date'])){ echo "new Date('".$_SESSION['date']."')"; } else {echo "new Date();";} ?>
//alert(start);
//document.getElementById('date').value=start;
//callServer('../controller/SetSessionTime.php',new array('date'),null);
var sh=start.getHours();
var sm=start.getMinutes();
var ss=start.getSeconds();
var ssec=sh*3600+sm*60+ss;
function startTime(hr,min)
{

var tflag=0;
var today=new Date();
var th=today.getHours();
var tm=today.getMinutes();
var ts=today.getSeconds();

var tsec=th*3600+tm*60+ts;

var diffsec=tsec-ssec;
if(diffsec > ((hr*60*60)+(min*60)))
{
 tflag=1;
}
var temp;
temp=diffsec%3600;
var h=(diffsec-temp)/3600;
diffsec=temp;
temp=diffsec%60;
var m=(diffsec-temp)/60;
diffsec=temp;
var s=diffsec;

// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
if(tflag != 1)
{
document.getElementById('clock').innerHTML="TIME: "+h+":"+m+":"+s+"<br/>Duration: "+min+" minutes";
t=setTimeout(function(){startTime(hr,min)},500);
}
else
{
alert("Timout !!!");
document.getElementById('quiz').submit();
}
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>

<body>
<?php
    error_reporting(0);
    require_once('../model/db.php');
    $database_obj=connectDB();
    $sql="select QuizId,QuizName from quiz where quiz.Active=1";
    foreach($database_obj->query($sql) as $row )
    {
	$_SESSION['quizid']= $row['QuizId'];
	$_SESSION['quizname']=$row['QuizName'];
    }	
    $sql  = "select * from quiz,questionbase,quizquestion where quiz.QuizId=quizquestion.QuizId and questionbase.queid=quizquestion.QuestionId and quiz.Active=1";
    $count=0;
?>
<form action='../model/RecordedAnswer.php' method='post' name='quiz' id='quiz' onsubmit='' >
<div id="clock" class="fix"></div>
<fieldset>
<span id="rollno" class="header">Welcome Student: <?php echo $_SESSION['rollno']; ?> </span>
<span id="Name" class="header_right">Quiz: <?php echo $_SESSION['quizname']; ?> </span> 
<br/>
<br/>
<input type='hidden' name='date' id="date" />
<?php    foreach($database_obj->query($sql) as $row )
    {
        echo "<br/>";
		echo "<br/>";
		
		echo "[";echo ++$count ;echo "]";echo " ";
		?>
		<input type="hidden" name="que<?php echo $count?>" value="<?php echo $row['QueId']?>">
		<?php
		echo $row['Question'];
		echo "<br/>";
		
		if($row['imageid'] != 0)
			echo "<img src = '../view/upload/showimg.php?id=".$row['imageid']."'/>";
		echo "</br>";
		echo "</br>";
			
		if($row['Img1'] != 0){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="1">A. <img src = "../view/upload/showimg.php?id=<?php echo $row['Img1']   ;?>"/>
	        <?php
		echo "</br>";
		}
	        else if($row['Opt1'] != NULL) {
		?>
		<input type="radio" name="ans<?php echo $count?>" value="1">A. <?php echo $row['Opt1']   ;?>
		<?php
		echo "</br>";
		}	
		if($row['Img2'] != 0){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="2">B. <img src = "../view/upload/showimg.php?id=<?php echo $row['Img2']    ;?>"/>
        	<?php
		echo "</br>";
		}
	    	else if($row['Opt2'] != NULL){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="2">B. <?php echo $row['Opt2']    ;?>
		<?php
		echo "</br>";
		}	
		if($row['Img3'] != 0){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="3">C. <img src = "../view/upload/showimg.php?id=<?php echo $row['Img3']     ;?>"/>
	        <?php
		echo "</br>";
		}
	    	else if($row['Opt3'] != NULL){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="3">C. <?php echo $row['Opt3']      ;?>
		<?php
		echo "</br>";
		}	
		if($row['Img4'] != 0){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="4">D. <img src = "../view/upload/showimg.php?id=<?php echo $row['Img4']      ;?>"/>
        	<?php
		echo "</br>";
		}
	    	else if($row['Opt4'] != NULL){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="4">D. <?php echo $row['Opt4']       ;?>
		<?php
		echo "</br>";
		}	
		if($row['Img5'] != 0){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="5">E. <img src = "../view/upload/showimg.php?id=<?php echo $row['Img5']     ;?>"/>
        	<?php
		echo "</br>";
		}
	    	else if($row['opt5'] != NULL){
		?>
		<input type="radio" name="ans<?php echo $count?>" value="5">E. <?php echo $row['opt5']        ;?>
		<?php
		echo "</br>";
		}
echo "--------------------------------------------------------------------------------------------------------------------------------";
}	
?>
<br/>
<input type="submit" value="submit" class="submit" onclick='return confirmSubmit();'>
</fieldset>
</br>
</form>
<a href="TypingTutor.html" target="_" id="typelink">Try our Typing Tutor page to improve your typing speed</a>
<script type='text/javascript'>
startTime(0,<?php echo $row['Duration'];?>);
</script>
</body>
