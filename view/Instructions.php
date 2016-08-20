<?php include_once("CheckLoginHeader.php"); ?>
<html>
<head>
<title> Vaanika Solution: Quiz Instructions</title>
<style type='text/css'>
fieldset {
	margin-left: 25%; 
    	margin-top: 10%;
    	width: 600px;
	text-align:center;
}
body
{
	background-image:url('./css/current/test.jpg');
	background-repeat:no-repeat;
	background-size:100%;
	background-color:#BDCDCA;
}
</style>
</head>
<body>
<form action='../view/QuestionShow.php' method='post'>
<fieldset>
<textarea readonly rows="8" cols="60">Instructions:

1.There are 30 Questions in the Quiz
2.No Negative marking.
3.Duration is 30 mins.

All the Best !!!!
</textarea>
<br/>
<input type='submit' value='Start Quiz' />
</fieldset>
</form>
</body>
