<?php 
include_once("CheckLoginHeader.php");
error_reporting(0);
session_start();
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
		<?php include_once "../controller/editQuiz.php" ?>
		<div id="content">
			<form action="../controller/CreateQuiz.php">
				<fieldset>
					<legend>Create Quiz</legend>
					<input type='hidden' name='qid' id='qid' value="<?php echo $_REQUEST['id']; ?>" />
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
					<label for="name">Quiz Name:</label>
					<input type="text" name="name" id="name" 
					value="<?php if(isset($_SESSION['qname'])){echo $_SESSION['qname']; } ?>"
					onblur='' />
					<span class='error' id='val_name'></span>
					</p>
					<p>
					<label for="desc">Description</label>
					<textarea type="text" name="desc" id="desc" onblur='' >
					<?php if(isset($_SESSION['desc'])){echo $_SESSION['desc']; } ?>
					</textarea>
					<span class='error' id='val_desc'></span>
					</p>
					<p>
					<label for="duration">Duration in Minutes</label>
					<input type="text" name="duration" id="duration" 
					value="<?php echo $_SESSION['duration']; ?>"
					onblur='' />
					<span class='error' id='val_duration'></span>
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
