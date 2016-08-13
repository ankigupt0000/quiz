<?php
include_once('../model/FetchSecQues.php');
$ques=getSecurityQues($_REQUEST['uname']);
if($ques=="" || $ques==null){
	echo "Error: The user is not having any question associated";
}else{
	echo $ques;
}
?>
