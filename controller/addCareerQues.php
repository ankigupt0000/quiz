<?php
require_once('../model/addCareerQues.php');
$queid=$_REQUEST['queid'];
deleteQues($queid);
if(is_array($_POST['queslist'])){
	foreach($_POST['queslist'] as $value)
	{
		associateQues($queid,$value);
	}
	echo "The questions are properly associated with the career";
}
?>
