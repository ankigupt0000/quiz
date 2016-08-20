<?php
		require_once('../model/db.php');
		function insertQues($ques,$option1,$option2,$option3,$option4,$option5,$ans,$imgid,$img1,$img2,$img3,$img4,$img5,$catid){
			$database_obj=connectDB();
			$sql="insert into questionbase(question,opt1,opt2,opt3,opt4,opt5,ans,imageid,img1,img2,img3,img4,img5,CatId) values ('".$ques."','".$option1."','".$option2."','".$option3."','".$option4."','".$option5."','".$ans."',".$imgid.",".$img1.",".$img2.",".$img3.",".$img4.",".$img5.",".$catid.");";
//			echo $sql;
			$_SESSION['msg']=31;
			$database_obj->query($sql);
			unset($_SESSION['image_id']);
			unset($_SESSION['opt1_id']);
			unset($_SESSION['opt2_id']);
			unset($_SESSION['opt3_id']);
			unset($_SESSION['opt4_id']);
			unset($_SESSION['opt5_id']);
		}
?>
