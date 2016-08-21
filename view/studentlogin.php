<?php
error_reporting(0);
session_start();
?>
<html>
	<head>
		<title>
			Vaanika Solutions Quiz 
		</title>
		<?php 
			include_once('../view/sp_meta.php');
			include_once('../model/studentlogin.php');
			include_once('../conf/messages.inc.php');
		?>		
		<link rel="stylesheet" type="text/css" href="css/current/sp_form.css" />	
	</head>              
	<body>
		<?php include_once "header.php" ?>
			<form action="../controller/studentlogin.php" method="post" title="StudentLogin">
                                <fieldset><legend>Vaanika Quiz</legend>
					<div class='error'>
					<?php
						if(isset($_SESSION['msg']))
						{
							echo $msg[$_SESSION['msg']];
							unset($_SESSION['msg']);
						}
					?>
					</div>
                                        
					<!--<p>
					<label for='cls'>Select Your Class:</label>
					<select name='cls'>
						<?php listClasses(); ?>
					</select>
					</p>-->
                                        <p>
                                        <label for="rollno">Student Roll No:</label>
                                        <input type="text" name="rollno" id="rollno" />
                                        </p>

                                        <p>
                                        <label for="passwd">Password:</label>
                                        <input type="password" name="passwd" id="passwd" />
                                        </p>

                                        <p class="submit">
                                        <input type="submit" value="submit" />
                                        </p>

                                        <p>
                                        <span id="error">
                                        <?php if(isset($_SESSION['login_form']['m'])) echo htmlspecialchars($msg[$_SESSION['login_form']['m']]);?>
                                        </span>
                                        </p>
                                </fieldset>
                        </form>
	</body>
</html>
