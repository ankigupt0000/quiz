<html>
<head>
<script language="javascript">
function checkAll(formname, checktoggle)
{
  var checkboxes = new Array(); 
  checkboxes = document[formname].getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      checkboxes[i].checked = checktoggle;
    }
  }
}
</script>

<title>
Select Questions
</title>
</head>
<body>
<form action='../controller/associateQues.php' name='secques' method='post'>
<a href="javascript: checkAll('secques','checked');" >Check All</a>
<a href="javascript: checkAll('secques','');" >Uncheck All</a>
<input type='hidden' name='queid' value='<?php echo $_REQUEST['id']; ?>' />
<?php
    require_once('../model/db.php');
    $database_obj=connectDB();
    $sql  = 'select * from category';
    foreach($database_obj->query($sql) as $row)
    {
?>
	<div> <b> <?php echo $row['CatName']; ?> </b></div>
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
