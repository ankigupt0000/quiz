<?php
	function connectDB(){
		$db_dsn="mysql:dbname=id7481567_qms;host=localhost;port=3306;mysql_connect_timeout=60";
		$db_user="id7481567_qms";
		$db_passwd="abcd1234";
		return new PDO($db_dsn,$db_user,$db_passwd);
	}
?>
