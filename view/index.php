<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

	<head>
		<title>Vaanika Solutions::Quiz</title>
		<?php include_once "meta.php" ?>
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
		<?php
			if(isset($_SESSION['user_name'])){
				header('location: ../view/Welcome.php');
			}
			else{
				header('location: ../view/UserLogin.php');
			}
?>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
