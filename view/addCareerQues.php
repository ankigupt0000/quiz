<?php include_once("CheckLoginHeader.php"); ?>
<html>
<head>
<title>
Select Questions
</title>
</head>
<body>
<form action='../controller/addCareerQues.php' method='post'>
<input type='hidden' name='queid' value='<?php echo $_REQUEST['id']; ?>' />
<?php
    require_once('../model/db.php');
    $database_obj=connectDB();
    $sql  = 'select * from category';
    foreach($database_obj->query($sql) as $row)
    {
?>
	<div> <?php echo $row['CatName']; ?></div>
<?php
	$sql='select * from questionbase where CatId='.$row['CatId'];
	foreach($database_obj->query($sql) as $quesrow)
	{
?>
<input type='checkbox' name='queslist[]' value="<?php echo $quesrow['QueId']; ?>" /> <?php echo $quesrow['Question']; ?> 
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
<input type='submit' />
</form>
</body>
