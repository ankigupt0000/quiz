<?php
session_start();
$_SESSION['career1']=$_REQUEST['career1'];
$_SESSION['career2']=$_REQUEST['career2'];
$_SESSION['career3']=$_REQUEST['career3'];
header('Location: ../view/Instructions.php');
?>

