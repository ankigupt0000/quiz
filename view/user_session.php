<?php
error_reporting(0);
session_start();
echo "<br/>";
if(isset($_SESSION['user_name']) && ($_SESSION['user_name']!="" || $_SESSION['user_name']!=NULL)){
	echo "<span id='user'>Welcome ".htmlspecialchars($_SESSION['user_name'])." | <a href='ChangePassword.php'>Change Password</a> | <a href='UserSecurityQues.php'>Change Security Ques</a> | <a href='UserLogout.php'>Log out</a></span>";
}
else{
	echo "<span id='user'><a href='UserLogin.php'>Login</a> ";
}
?>
