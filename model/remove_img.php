<?php
		require '../model/db.php';
		function removeImg($imgid){
			$database_obj=connectDB();
			$sql="delete from QuesImage where id='".$imgid."'";
//			echo $sql;
			$database_obj->query($sql);
			echo "The image successfully removed from the application";
			echo "<script language='javascript' type='text/javascript'>window.close()</script>";
		}
?>
