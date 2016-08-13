<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Online Quiz Portal::Change Password</title>
		<?php include_once "meta.php" ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
		<script type='text/javascript' src='js/validation.js' ></script>
		<script type="text/javascript">
			function checkPasswd(){
				if(check_null('passwd','val_passwd') && check_length('passwd','val_passwd',8)){
					if(check_RegExp('passwd','val_passwd',/^[a-zA-Z0-9]+$/,'')){
						document.getElementById('val_passwd').innerHTML="Password must have one special character";
					}
				}
			}
			function checkConfPasswd(){
				if(check_null('conf_passwd','val_conf_passwd')){
					compare('passwd','conf_passwd','val_conf_passwd','The passwod and confirm password don\'t match');
				}
			}
		</script>
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
		<?php
		if(isset($_SESSION['user_name'])){
		?>
		<form action="../controller/ChangePassword.php">
				<fieldset>
					<legend>Change Your Password</legend>
	
					<p>
					<label for="old_passwd">Old Password:</label>
					<input type="password" name="old_passwd" id="old_passwd" onblur='check_null("old_passwd","val_oldpasswd")' />
					<span class='error' id='val_oldpasswd'></span>
					</p>
					
					<p>
					<label for="passwd">New Password:</label>
					<input type="password" name="passwd" id="passwd" onblur='checkPasswd()'/>
					<span class='error' id='val_passwd'></span>
					</p>
					
					<p>
					<label for="conf_passwd">Confirm New Password:</label>
					<input type="password" name="conf_passwd" id="conf_passwd" onblur='checkConfPasswd()' />
					<span class='error' id='val_conf_passwd'></span>
					</p>
					
					<p class="submit">
					<input type="submit" value="submit" />
					</p>
					
					<p>
					<span id="error">
					<?php if(isset($_SESSION['pwd_form']['m'])) echo $msg[$_SESSION['pwd_form']['m']];?>
					</span>
					</p>										
				</fieldset>
			</form>
			<?php unset($_SESSION['pwd_form']); ?>
		<?php
		}
		else{
			header('location: UserLogin.php');
		}
		?>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
