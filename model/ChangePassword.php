<?php
	include_once('../model/db.php');
	function changePasswd($uname,$old_passwd,$new_passwd){
		$database_obj=connectDB();
                $sql="SELECT count(*) as exist from admin where UserName='".$uname."' and Passwd='".$old_passwd."'";
                echo $sql;
                foreach ($database_obj->query($sql) as $row) {
                        $exist=$row['exist'];
                }
		if($exist==1)
		{
			$sql="update admin set Passwd='".$new_passwd."' where UserName='".$uname."'";
			$database_obj->query($sql);
		}
	}	
?>
