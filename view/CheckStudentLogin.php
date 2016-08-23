<?php
//if(!isset($_COOKIE["PHPSESSID"]))
//{
  session_start();
//}
	if(!isset($_SESSION['studid'])){
		header("Location: ../view/studentlogin.php");
	}
?>
