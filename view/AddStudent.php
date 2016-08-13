<?php 

error_reporting(0);
session_start();
include_once("../model/GetCategory.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<?php include_once "meta.php" ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
		<script type='text/javascript' src='js/validation.js' ></script>
		<script type="text/javascript" src="js/ajax.js" ></script>
		
	</head>
	<body onfocus="callServer('InsQuesPart.php','','imgInfo');" onload="callServer('InsQuesPart.php','','imgInfo');">
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
			<form action="../controller/AddStudent.php">
				<fieldset>
					<legend>Add New Student Information</legend>
					<input type='hidden' name='image_id' id='image_id' />
					<p class='submit'>
					<?php
					 if( isset($_SESSION['msg']))
					 {
						echo $msg[$_SESSION['msg']];
						unset($_SESSION['msg']);
					 }
					?>
					</p>
					<p>
					<label for="SName">Student Name:</label>
					<input type="text" name="SName" id="SName" onblur=''/>
					<span class='error' id='val_sname'></span>
					</p>
					<p>
					<label for="SClass">Class:</label>
					<input type="text" name="SClass" id="SClass" onblur=''/>
					<span class='error' id='val_sclass'></span>
					</p>
					<p>
					<label for="SRollNo">Roll No:</label>
					<input type="text" name="SRollNo" id="SRollNo" onblur=''/>
					<span class='error' id='val_rollno'></span>
					</p>
					<p class='submit'>
					<input type='Submit' name='Submit' id='Submit' />
					</p>						


				</fieldset>
			</form>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
