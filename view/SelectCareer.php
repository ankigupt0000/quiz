<?php
include_once("CheckLoginHeader.php");
include_once('../model/SelectCareer.php');
?>
<html>
<head>
<title>Select any three career choices</title>
<script type='text/javascript'>
function Check3Only()
{
	if(document.getElementById('career1').value==document.getElementById('career2').value || document.getElementById('career1').value==document.getElementById('career3').value || document.getElementById('career2').value==document.getElementById('career3').value)
	{
		alert('Select different choises');
		return false;
	}
	return true;
}
</script>
<style media="screen" type="text/css">
fieldset {
	margin-left: 25%; 
    	margin-top: 10%;
    	width: 600px;
	text-align:center;
}
body
{
	background-image:url('./css/current/good.jpg');
	background-repeat:no-repeat;
	background-size:100%;
	background-color:#BDCDCA;
}
/*
fieldset
{
    display: inline-block;
    position:relative;
    left:16%;
}*/
</style>
</head>
<body>

<form action='../controller/SelectCareer.php' onsubmit='return Check3Only()'>
	<fieldset>
	Please select three choices for you career: 
	<br/>
	<br/>
	Select choice 1:
	<select name='career1' id='career1'>
		<?php showCareer(); ?>
	</select>
	<br/>
	Select choice 2:
	<select name='career2' id='career2'>
		<?php showCareer(); ?>
	</select>
	<br/>
	Select choice 3:
	<select name='career3' id='career3'>
		<?php showCareer(); ?>
	</select>
	<br/>
	<br/>
	<input type='Submit' name="Start Quiz" value="Next" />
	</fieldset>
</form>
</body>
</html>
