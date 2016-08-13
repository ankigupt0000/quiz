<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Online Quiz Portal::Home</title>
		<?php include_once "meta.php" ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
		<script type='text/javascript' src='js/validation.js' ></script>
		<script type="text/javascript" src="js/ajax.js" ></script>
		<script type="text/javascript">
			var mail_arr=new Array('uname');
			function checkUname(){
				if(check_RegExp('uname','val_uname',/^[a-zA-Z0-9_]{6,50}$/,'User Name should at least 6 characters and must not contain special characters except _')){
					callServer('../controller/CheckUser.php',mail_arr,'val_uname');
				}
			}
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
		<div id="content">
			<form action="../controller/UserRegistration.php">
				<fieldset>
					<legend>Login Information</legend>
					
					<p>
					<label for="uname">User Name:</label>
					<input type="text" name="uname" id="uname" onblur='checkUname()'
					value="<?php if(isset($_SESSION['reg_form']['uname'])) echo htmlspecialchars($_SESSION['reg_form']['uname']); ?>" />
					<span class='error' id='val_uname'></span>
					</p>
					
					<p>
					<label for="passwd">Password:</label>
					<input type="password" name="passwd" id="passwd" onblur='checkPasswd()'/>
					<span class='error' id='val_passwd'></span>
					</p>
					
					<p>
					<label for="conf_passwd">Confirm Password:</label>
					<input type="password" name="conf_passwd" id="conf_passwd" onblur='checkConfPasswd()' />
					<span class='error' id='val_conf_passwd'></span>
					</p>
										
				</fieldset>
				<fieldset>
					<legend>Personal Information</legend>
					
					<p>
					<label for="fname">First Name:</label>
					<input type="text" name="fname" id="fname" onblur="check_null('fname','val_fname')"
					value="<?php if(isset($_SESSION['reg_form']['fname'])) echo htmlspecialchars($_SESSION['reg_form']['fname']);?>" />
					<span class='error' id='val_fname'></span>
					</p>
					
					<p>
					<label for="lname">Last Name:</label>
					<input type="text" name="lname" id="lname" onblur='check_null("lname","val_lname")'
					value="<?php if(isset($_SESSION['reg_form']['lname'])) echo htmlspecialchars($_SESSION['reg_form']['lname']);?>" />
					<span class='error' id='val_lname'></span>
					</p>
					
					<p>
					<label for="email">Email ID:</label>
					<input type="text" name="email" id="email" onblur='checkEmail()'
					value="<?php if(isset($_SESSION['reg_form']['email'])) echo htmlspecialchars($_SESSION['reg_form']['email']);?>" />
					<span class='error' id='val_email'></span>
					</p>
					
					<p>
					<label for="date">Date of Birth:</label>
					<select name="date" id="date" onchange="check_date()">
					<?php
						for($i=1;$i<=31;$i++){
							if(isset($_SESSION['reg_form']['date']) && $_SESSION['reg_form']['date']==$i){
								echo "<option value='$i' selected='selected'>$i</option>";
							}else{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
					</select>
					<select name="month" id="month" onchange='check_date()'>
					<?php
						for($i=1;$i<=12;$i++){
							$month=array('','January', 'Feburary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
							if(isset($_SESSION['reg_form']['month']) && $_SESSION['reg_form']['month']==$i){
								echo "<option value='$i' selected='selected'>$month[$i]</option>";
							}else{
								echo "<option value='$i'>$month[$i]</option>";
							}
							
						}
					?>
					</select>
					<select name="year" id="year" onblur="check_date()">
					<?php 
						date_default_timezone_set('Asia/Calcutta');
						for($i=date('Y');$i>=1900;$i--){
							if(isset($_SESSION['reg_form']['year']) && $_SESSION['reg_form']['year']==$i){
								echo "<option value='$i' selected='selected'>$i</option>";
							}else{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
					</select>
					<span class='error' id='val_date'></span>
					</p>
					
					<p>
					<label for="phone">Phone:</label>
					<input type="text" name="phone" id="phone" onblur='checkPhone()'
					value="<?php if(isset($_SESSION['reg_form']['phone'])) echo htmlspecialchars($_SESSION['reg_form']['phone']);?>" />
					<span class='error' id='val_phone'></span>
					</p>
					
					<p>
					<label for="sec_question">Security Quesiton:</label>
					<select id="sec_question" name="sec_question" onchange="show_other_ques()">
						<?php
						$sec_ques=array("What is your first school name?","What is your favourite movie?","What is your first teacher name?","Your own question");
						for($i=0;$i<=3;$i++){
							if(isset($_SESSION['reg_form']['sec_question']) && $_SESSION['reg_form']['sec_question']==$i){
								echo "<option value='$i' selected='selected'>$sec_ques[$i]</option>";
							}
							else{
								echo "<option value='$i' > $sec_ques[$i]</option>";
							}
						}
						?>
					</select>
					<span class='error' id='val_sec_question'></span>
					</p>
					
					<p id="otherques" style="display:none;">
					<label for="other_ques">Your Question:</label>
					<input type="text" name="other_ques" id="other_ques" onblur="check_null('other_ques','val_other_ques')"
					value="<?php if(isset($_SESSION['reg_form']['other_ques'])) echo htmlspecialchars($_SESSION['reg_form']['other_ques']);?>" />
					<span class='error' id='val_other_ques'></span>
					</p>
					
					<p>
					<label for="sec_ans">Security Answer:</label>
					<input type="text" name="sec_ans" id="sec_ans" onblur="check_null('sec_ans','val_sec_ans')"
					value="<?php if(isset($_SESSION['reg_form']['sec_ans'])) echo htmlspecialchars($_SESSION['reg_form']['sec_ans']);?>" />
					<span class='error' id='val_sec_ans'></span>
					</p>
					
					<p class="submit">
					<input type="submit" value="submit" />
					</p>
					
					<p>
					<span id="error">
					<?php if(isset($_SESSION['reg_form']['m'])) echo htmlspecialchars($msg[$_SESSION['reg_form']['m']]);?>
					</span>
					</p>
					
				</fieldset>
			</form>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
