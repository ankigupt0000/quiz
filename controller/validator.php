<?php
	function check_null($string){
		if($string=="" || $string==null){
			return true;
		}
		return false;
	}	
	function checkage($month,$date,$year){
		date_default_timezone_set('UTC');
		$current_date=time();
		$dob=mktime(0,0,0,$month,$date,$year);
		$diff=$current_date-$dob;
		$years= floor($diff/(60*60*24*365));
		return $years;
	}
?>
