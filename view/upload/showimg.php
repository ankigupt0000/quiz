<?php
 error_reporting(0);
 session_start();
 include "../../../public_html/view/upload/file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks
 if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
     //connect to the db
	 $db_dsn="mysql:dbname=u898788349_qms;host=localhost;port=3306;mysql_connect_timeout=60";
	 $db_user="u898788349_qms";
	 $db_passwd="NOKIAN72";
	 $link =new PDO($db_dsn,$db_user,$db_passwd);
     // mysql_connect("$host", "$user", "$pass")
     //or die("Could not connect: " . mysql_error());
	 $db=$db_user;

     // select our database
     //mysql_select_db("$db") or die(mysql_error());

     // get the image from the db
     $sql = "SELECT image FROM quesimage WHERE id=" .$_REQUEST['id']. ";";

     // the result of the query
     $result = $link->query("$sql") or die("Invalid query: " . mysql_error());

     // set the header for the image
     header("Content-type: image/jpeg");
	 foreach ($result as $row) {
		echo $row['image'];
	 }

     // close the db link
     //mysql_close($link);
 }
 else {
     echo 'Please use a real id number';
 }
?>
