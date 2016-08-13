<div id="header">
	<?php include_once("../conf/application.conf.php"); ?>
	<img src="css/<?php echo $app['theme'];?>/images.jpg" />
	<span id="site_title"><?php echo htmlspecialchars($app['site_name']) ?></span>
	<?php include_once("../view/user_session.php") ?>
</div>
