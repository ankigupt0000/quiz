<html>
<head>
<title>
Select Questions
</title>
</head>
<body>
<form action='../controller/associateQues.php' method='post'>
<?php
    require_once('../model/db.php');
    $database_obj=connectDB();
    $sql  = 'select * from category';
    $count=0;
    foreach($database_obj->query($sql) as $row)
    {
?>
	<div><b> <?php echo $row['CatName']; ?></b></div>
<?php
	$sql="select * from questionbase,CareerQues where questionbase.QueId=CareerQues.QuestionId and CareerQues.CareerName='".$_REQUEST['id']."' and questionbase.CatId=".$row['CatId'];
	foreach($database_obj->query($sql) as $quesrow)
	{
	echo ++$count; echo ". ";
	echo $quesrow['Question'];
	echo "<br/>";
?>
	
	<br/>
	<?php if($quesrow['imageid'] != 0) {
	?>
		<img src="../view/upload/showimg.php?id=<?php echo $quesrow['imageid']; ?>" />
		<br/>
	<?php
		}
	?>
<?php		
	}
	echo "<br/>";
    }
?>
</form>
</body>
