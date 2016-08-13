<?php
	function connectDB(){
		$db_dsn="mysql:dbname=u898788349_qms;host=localhost;port=3306;mysql_connect_timeout=60";
		$db_user="u898788349_qms";
		$db_passwd="NOKIAN72";
		return new PDO($db_dsn,$db_user,$db_passwd);
	}
?>
