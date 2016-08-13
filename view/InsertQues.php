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
			<form action="../controller/InsertQues.php">
				<fieldset>
					<legend>Insert Question</legend>
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
					<label for="ques">Question:</label>
					<textarea rows="4" cols="50" name='ques' id='ques'></textarea>
					<span class='error' id='val_uname'></span>
					</p>
					<p>
					<label for="option1">Option 1:</label>
					<input type="text" name="option1" id="option1" onblur=''/>
					or <a href='upload/upload.php?id=opt1_id' target='_blank'>Upload Option-1 Image</a>
					<span class='error' id='val_opt1'></span>
					</p>
					<p>
					<label for="option2">Option 2:</label>
					<input type="text" name="option2" id="option2" onblur=''/>
					or <a href='upload/upload.php?id=opt2_id' target='_blank'>Upload Option-2 Image</a>
					<span class='error' id='val_opt2'></span>
					</p>
					<p>
					<label for="option3">Option 3:</label>
					<input type="text" name="option3" id="option3" onblur=''/>
					or <a href='upload/upload.php?id=opt3_id' target='_blank'>Upload Option-3 Image</a>
					<span class='error' id='val_opt3'></span>
					</p>
					<p>
					<label for="option4">Option 4:</label> 
					<input type="text" name="option4" id="option4" onblur=''/> or <a href='upload/upload.php?id=opt4_id' target='_blank'>Upload Option-4 Image</a>
					<span class='error' id='val_opt4'></span>
					</p>
					<p>
					<label for="option5">Option 5:</label>
					<input type="text" name="option5" id="option5" onblur=''/> or <a href='upload/upload.php?id=opt5_id' target='_blank'>Upload Option-5 Image</a>
					<span class='error' id='val_opt5'></span>
					</p>
					<p>
					<label for="Ans">Correct Answer:</label>
					<input type="text" name="Ans" id="Ans" onblur='' />
					<span class='error' id='val_ans'></span>
					</p>
					
					<p>
					<label for="Category">Category:</label>
					<select name="Category" id='Category'>
					<?php
					GetCat();
					?>
					</select>
					
					<p class='submit'>
					<a href='upload/upload.php?id=image_id' target='_blank'>Upload Image</a>
					</p>
					<div id='imgInfo' name='imgInfo'></div>
					<p class='submit'>
					<input type='Submit' name='Submit' id='Submit' />
					</p>						


				</fieldset>
			</form>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
