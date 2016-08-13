<?php
require_once('../model/associateQues.php');
$queid=$_REQUEST['queid'];
deleteQues($queid);
if(isset($_POST['queslist']))
{
	if(is_array($_POST['queslist'])){
		foreach($_POST['queslist'] as $value)
		{
			associateQues($queid,$value);
		}
		echo "The questions are properly associated with the quiz";
	}
}
else
{
	echo "Plase, select at least one question for quiz.";
}
?>
