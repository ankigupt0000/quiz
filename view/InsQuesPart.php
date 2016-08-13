<?php session_start(); ?>
<p>
<?php if(isset($_SESSION['image_id'])) { ?>
 Question Image  <a target='_blank' href='../controller/remove_img.php?id=image_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['image_id'];?>" /><br/>
 <br/>
<?php } ?>
<?php if(isset($_SESSION['opt1_id'])) { ?>
 Option1 Image <a target='_blank' href='../controller/remove_img.php?id=opt1_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['opt1_id'];?>" /><br/>
 <br/>
<?php } ?>
<?php if(isset($_SESSION['opt2_id'])) { ?>
 Option2 Image <a target='_blank' href='../controller/remove_img.php?id=opt2_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['opt2_id'];?>" /><br/>
 <br/>
<?php } ?>
<?php if(isset($_SESSION['opt3_id'])) { ?>
 Option3 Image <a target='_blank' href='../controller/remove_img.php?id=opt3_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['opt3_id'];?>" /><br/>
 <br/>
<?php } ?>
<?php if(isset($_SESSION['opt4_id'])) { ?>
 Option4 Image <a target='_blank' href='../controller/remove_img.php?id=opt4_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['opt4_id'];?>" /><br/>
 <br/>
<?php } ?>
<?php if(isset($_SESSION['opt5_id'])) { ?>
 Option5 Image <a target='_blank' href='../controller/remove_img.php?id=opt5_id'>Remove Image</a> 
 <br/><img src="upload/showimg.php?id=<?php echo $_SESSION['opt5_id'];?>" /><br/>
 <br/>
<?php } ?>
</p>


