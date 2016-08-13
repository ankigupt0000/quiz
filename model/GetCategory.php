<?php
//error_reporting(E_ALL);
function GetCat()
{
    require_once('../model/db.php');
	$database_obj=connectDB();
    $sql  = "select * from category";

    foreach($database_obj->query($sql) as $row )
    {
	echo "<option value='".$row['CatId']."'>".$row['CatName']."</option>";
    }
	
}
//GetCat();
?>