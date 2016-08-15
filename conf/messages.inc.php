<?php
 session_start();
 $spass='';
 $sqname='';
 if(isset($_SESSION['pass']))
 {
	$spass=$_SESSION['pass'];
 }
 if(isset($_SESSION['qname']))
 {
	$sqname=$_SESSION['qname'];
 }
 $msg[0]="";
 $msg[1]="The field User Name can't be left blank";
 $msg[2]="The field Password can't be left blank";
 $msg[3]="The combination of User Name and Password don't exists";
 $msg[4]="The field Confirm Password can't be left blank";
 $msg[5]="The Password and Confirm Password don't match";
 $msg[6]="The field First Name can't be left blank";
 $msg[7]="The field Last Name can't be left blank";
 $msg[8]="The field Email ID can't be left blank";
 $msg[9]="The email id in not in correct format";
 $msg[10]="The date of birth doesn't exists in calendar";
 $msg[11]="You are too young to use this site";
 $msg[12]="Field phone number can't be left blank";
 $msg[13]="You have not inserted correct phone number";
 $msg[14]="Field sequrity question can't be left blank";
 $msg[15]="The security answer must be provided";
 $msg[16]="The field User Name should have more then 6 characters and should not have any characters execpt _ (underscore), letters and numbers";
 $msg[17]="The field First Name can't have special characters and numbers";
 $msg[18]="The field Last Name can't have special characters and numbers";
 $msg[19]="The User Name already exists please try another";
 $msg[20]="Password should be atleast of 8 characters including a special character";
 $msg[21]="<span class='no_error'>Your profile is successfully updated</span>";
 $msg[22]="The old password field can't be left blank";
 $msg[23]="You have provided the wrong current password";
 $msg[24]="<span class='no_error'>Your password is successfully changed</span>";
 $msg[25]="This user don't exist";
 $msg[26]="<span class='no_error'>The user name is available</span>";
 $msg[27]="You have provided wrong security answer";
 $msg[28]="<span class='no_error'>The changed password is ".$spass."</span>";
 $msg[29]="Student added successfully";
 $msg[30]="Password updated successfully to &lt;roll_no&gt;_".$spass;
 $msg[31]="Question inserted successfully";
 $msg[32]="Quiz ".$sqname." activated";
 $msg[33]="New Quiz Category successfully added";
?>
