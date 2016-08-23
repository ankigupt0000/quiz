<?php
	include_once("CheckStudentLogin.php");
    error_reporting(0);
    session_start();
    //header("Content-type: image/svg+xml");
    require_once('../model/db.php');
	$correct=0; $incorrect=0;
    $database_obj=connectDB();
	$sql="SELECT count(*) as cnt FROM result,questionbase WHERE studentid=".$_SESSION['studid']." and quizid = ".$_SESSION['quizid']." and questionid=queid and ans=selectedans";
	foreach($database_obj->query($sql) as $row )
    {
		$correct=$row['cnt'];
	}
	$sql="SELECT count(*) as cnt FROM result,questionbase WHERE studentid=".$_SESSION['studid']." and quizid = ".$_SESSION['quizid']." and questionid=queid and ans!=selectedans";
	foreach($database_obj->query($sql) as $row )
    {
		$incorrect=$row['cnt'];
	}
?>
<html>
<head>
<style type='text/css'>
#result {
	font-size:40px;
	position:absolute;
	left:30%;
	top:50%;
}
</style>
<title> Result </title>
</head>
<body>
<div id="result">
<?php
	echo ("Your score for the quiz is ");
	echo(round($correct/($correct+$incorrect)*100,2));
	echo(" percent");
?>
</div>
</body>
</html>
<?php
/*
$rad=150;
$cx=160;
$cy=160;
$sum=0;

$ix=$cx;
$iy=$cx-$rad;
$angle=array();
$val=array($correct,$incorrect);
$color=array('4572a9','aa4643','89a54e','71588f','4198af','db843d','93a9cf','ff0000','737373','0000ff','ffff00','00ffff');
foreach($val as $k => $v)
{
	$sum+=$v;
}
$c=0;
foreach($val as $k => $v)
{
	$angle[$c++]=360*($v/$sum);
}

?>
<svg width="400" height="400">
<?php
$c=0;
$sumangle=0;
$laf="";
foreach($angle as $k => $v)
{
//echo $color;
if($angle[$c]>180)
{
 	$laf="0 1,1";
}
else
{
	$laf="1 0,1";
}
$sumangle+=$angle[$c];
$ex=$cx+($rad*sin(deg2rad($sumangle)));
$ey=$cy-($rad*cos(deg2rad($sumangle)));
$textx=$cx+(($rad/1.5)*sin(deg2rad($sumangle-($angle[$c]/2))));
$texty=$cy-(($rad/1.5)*cos(deg2rad($sumangle-($angle[$c]/2))));
?>
<path d="M<?php echo $cx.",".$cy; ?> L<?php echo $ix.",".$iy; ?> A<?php echo $rad.",".$rad; ?> <?php echo $laf; ?> <?php echo $ex.",".$ey; ?> z"
	style="fill:#<?php echo $color[$c]; ?>;
		fill-opacity: 1;
		stroke:white;
		stroke-width: 1"/>
<text x="<?php echo $textx; ?>" y="<?php echo $texty; ?>" font-size="12" fill="black"><?php echo round(($val[$c]/$sum)*100); ?>%</text>
<?php
$ix=$ex;
$iy=$ey;
$c++;
}*/
?>
