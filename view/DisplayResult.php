<?php
	include_once("CheckLoginHeader.php");
    error_reporting(0);
    session_start();
    header("Content-type: image/svg+xml");
    require_once('../model/db.php');
    $database_obj=connectDB();
?>
<!--<xml version="1.0" standalone="no">-->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink">
<text x="40%" y="50" font-family="Verdana" font-size="55">Quiz Result</text>
<?php		
	$result[][]=0;
	$sql="select * from category";
	$rowno=0;
	foreach($database_obj->query($sql) as $row )
        {
		$rowno++;
		$catid=$row['CatId'];
		$quizid=$_SESSION['quizid'];
		$studid=$_SESSION['studid'];
		$count=0;
		$correct=0;
		$recwidth=0;
		$percent=0;

		$sql0="SELECT * 
		FROM quizquestion, questionbase
		WHERE quizquestion.QuestionId = questionbase.QueId
		AND quizquestion.QuizId =$quizid
		AND questionbase.CatId =$catid";
		foreach($database_obj->query($sql0) as $row1)
		{
			$count++;
		}
		$result[$catid]['count']=$count;
		$result[$catid]['name']=$row['CatName'];
	        $sql1="select * from result,quiz,quizquestion,questionbase where result.StudentId=$studid
		and result.QuizId=quizquestion.QuizId       
		and result.QuestionId=quizquestion.QuestionId
		and quizquestion.QuestionId=questionbase.QueId
		and quizquestion.QuizId=quiz.QuizId
		and result.SelectedAns=questionbase.Ans
		and result.QuizId=$quizid
		and questionbase.CatId=$catid";
		foreach($database_obj->query($sql1) as $row1)
		{
			$correct++;
		}
		$result[$catid]['correctAns']=$correct;
		$y=($rowno-1)*75;
		if ($result[$catid]['count'] != 0 )
		{
		$percent=($result[$catid]['correctAns']/$result[$catid]['count'])*100;
		$recwidth=$percent*5;
		}
		$recwidth+=40;
		if($percent > 80)
			$color="rgb(0,255,0)";
		else if($percent > 65)
			$color="rgb(0,150,0)";
		else if($percent > 50)
			$color="rgb(0,50,0)";
		else if($percent > 35)
			$color="rgb(255,255,0)";
		else
			$color="red";
		$x=250;
		if($catid != 1)
		{
?>
 <text x="<?php echo $x; ?>" y="<?php echo $y;  ?>" ><?php echo $result[$catid]['name']; ?></text>
<rect width="<?php echo 2+$recwidth; ?>" height="30" x="<?php echo $x; ?>" y="<?php echo $y+20;?>"
  style="fill:<?php echo $color; ?>;stroke-width:1;stroke:rgb(0,0,0)"/>
<text x="<?php echo $x-10+($recwidth/2); ?>" y="<?php echo $y+40;?>" style="fill:black;"><?php echo $percent; ?> %</text>
<?php
		}

    	}
?>
<rect width="80" height="30" x="45%" y="<?php echo $y+80; ?>" fill="rgb(100,100,100)" />
<a xlink:href="../view/DisplayCareer.php"> 
	<text x="45%" y="<?php echo $y+100; ?>">Continue</text>
</a>
</svg>
