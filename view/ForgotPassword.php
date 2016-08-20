<?php include_once("CheckLoginHeader.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Online Quiz::Home</title>
		<?php include_once "meta.php" ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
		<script type='text/javascript' src='js/validation.js' ></script>
		<script type="text/javascript" src="js/ajax.js" ></script>
		<script type="text/javascript">
			var array=new Array('uname');
			function getSecQues(){
				if(check_null('uname','val_uname')){
					callServer('../controller/FetchSecQues.php',array,'sec_ques');
				}
			}
		</script>
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
			<form action="../controller/ForgotPassword.php">
				<fieldset>
					<legend>Password Recovery Form</legend>
					
					<p>
					<label for="uname">User Name:</label>
					<input type="text" name="uname" id="uname" onblur="getSecQues()"
					value="<?php if(isset($_SESSION['forgot_form']['uname'])) echo htmlspecialchars($_SESSION['forgot_form']['uname']);?>"
					/>
					<span class="error" id="val_uname"></span>
					</p>
					
					<p>
					<label >Security Question</label>
					<input type="hidden" />
					<span id='sec_ques'>Please enter the user name to get security question</span><br/>
					</p>
					
					<p>
					<label for="sec_ans">Answer</label>
					<input type="text" name="sec_ans" id="sec_ans" 
					value="<?php if(isset($_SESSION['forgot_form']['sec_ans'])) echo htmlspecialchars($_SESSION['forgot_form']['sec_ans']);?>"
					/>
					</p>
					
					<p class="submit">
					<input type="submit" value="submit" />
					</p>
					
					<p>
					<span id="error">
					<?php if(isset($_SESSION['forgot_form']['m'])) echo $msg[$_SESSION['forgot_form']['m']];?>
					</span>
					</p>
					
				</fieldset>
			</form>
			<?php unset($_SESSION['forgot_form']);?>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
