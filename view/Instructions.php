<?php include_once("CheckStudentLogin.php"); ?>
<?php include_once("../model/activateQuiz.php"); ?>
<html>
<head>
<title> Vaanika Solution: Quiz Instructions</title>
<style type='text/css'>
fieldset {
	margin-left: 20%; 
    margin-top: 10%;
    width: 60%;
	text-align:center;
}
body
{
	background-image:url('./css/current/test.jpg');
	background-repeat:no-repeat;
	background-size:100%;
	background-color:#BDCDCA;
}
.header
{
	font-size:30;
}
</style>
</head>
<body>
<form action='../view/QuestionShow.php' method='post'>
<fieldset>
<div class="header">Quiz:&nbsp;&nbsp;<?php echo getQuizName(); ?></div>
<br/>
<br/>
<textarea readonly rows="20" cols="60">Instructions:
<?php echo getQuizInstruction(); ?> 
</textarea>
<br/>
<br/>
<br/>
<input type='submit' value='Start Quiz' />
</fieldset>
</form>
</body>
