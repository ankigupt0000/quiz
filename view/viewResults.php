<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Online Quiz Portal::Home</title>
		<?php include_once "meta.php" ?>
		<?php include_once('../model/studentlogin.php'); ?>
		<?php include_once "../conf/messages.inc.php" ?>
		<link rel="stylesheet" type="text/css" href="css/current/form.css" />
	</head>
<body>
<?php include_once "header.php" ?>
<?php include_once "menu.php" ?>
<form action="../controller/viewResults.php" method="post">
                                <fieldset>
					<div class='error'>
					<?php
						if(isset($_SESSION['msg']))
						{
							echo $msg[$_SESSION['msg']];
							unset($_SESSION['msg']);
						}
					?>
					</div>
                                        <legend>Check Student Result</legend>
										<p>
										<label for='cls'>Select Your Class:</label>
										<select name='cls'>
											<?php listClasses(); ?>
										</select>
										</p>
                                        <p>
                                        <label for="uname">Student Roll No:</label>
                                        <input type="text" name="rollno" id="rollno" />
                                        </p>
										<p>
										<label for="quizid">Quiz Id:</label>
										<select name="quizid" id="quizid">
										<?php
											require_once('../model/db.php');
											$database_obj=connectDB();
											$sql='select * from quiz';
											foreach($database_obj->query($sql) as $row)
											{
												echo "<option value='".$row['QuizId']."'>".$row['QuizName']."</option>";
											}
										?>
										</select>
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