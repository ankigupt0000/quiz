<?php
if(!isset($_COOKIE["PHPSESSID"]))
{
  session_start();
}
	if(!isset($_SESSION['user_name'])){
		header("Location: ../view/UserLogin.php");
	}
?>
