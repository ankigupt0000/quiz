<?php
include_once("CheckLoginHeader.php");
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Online Quiz Portal::Update Profile</title>
		<?php include_once "meta.php" ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
		<script type='text/javascript' src='js/validation.js' ></script>
		<script type="text/javascript">
			var mail_arr=new Array('uname');
			function checkEmail(){
				if(check_null('email','val_email')){
					check_RegExp('email','val_email',/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9])+(\.[a-zA-Z0-9_-]+)+$/,'Email id is in wrong format')
				}
			}
			function checkPhone(){
				if(check_null('phone','val_phone') && check_length('phone','val_phone',10)){
					check_numeric('phone','val_phone');
				}
			}
			function show_other_ques(){
				if(document.getElementById('sec_question').value==3){
					document.getElementById('otherques').style.display= 'block';
				}else{
					document.getElementById('otherques').style.display= 'none';
				}
			}
		</script>
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<?php	
			include_once('../model/UserSecurityQues.php');
			getUserData();
			$upd_form=$_SESSION['upd_form_db'];
		?>
		<div id="content">
			<?php include_once "../view/CheckLoginHeader.php" ?>
			<form action="../controller/UserSecurityQues.php" method="post">
				<fieldset>
					<legend>Personal Information</legend>
					
					
					<p id="otherques">
					<label for="SecurityQue">Your Question:</label>
					<input type="text" name="SecurityQue" id="SecurityQue" onblur="check_null('SecurityQue','val_other_ques')"
					value="<?php if(isset($upd_form['SecurityQue'])) echo htmlspecialchars($upd_form['SecurityQue']);?>" />
					<span class='error' id='val_other_ques'></span>
					</p>
					
					<p>
					<label for="SecurityAns">Security Answer:</label>
					<input type="text" name="SecurityAns" id="SecurityAns" onblur="check_null('SecurityAns','val_sec_ans')"

					value="<?php if(isset($upd_form['SecurityAns'])) echo htmlspecialchars($upd_form['SecurityAns']);?>" />
					<span class='error' id='val_sec_ans'></span>
					</p>
					
					<p class="submit">
					<input type="submit" value="submit" />
					</p>
					
					<p>
					<span id="error">
					<?php if(isset($_SESSION['upd_form']['m'])) echo $msg[$_SESSION['upd_form']['m']]; ?>
					</span>
					</p>

				</fieldset>
			</form>
			<?php unset($_SESSION['upd_form_db']); unset($_SESSION['upd_form']); ?>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
