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
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
				<?php include_once("../model/CheckCurrentPassword.php"); ?>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
