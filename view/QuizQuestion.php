<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Online Shopping Portal::Home</title>
		<?php include_once "meta.php" ?>
	</head>
	<body>
		<?php include_once "header.php" ?>
		<?php include_once "menu.php" ?>
		<div id="content">
		<table>
		<?php
			require_once('../model/db.php');
			$database_obj=connectDB();
			$sql='select * from quiz';
			foreach($database_obj->query($sql) as $row)
			{
				echo "<tr>";
				echo "<td>";
				echo $row['QuizId'];
				echo "</td>";
				echo "<td>";
				echo "<a href='associateQues.php?id=".$row['QuizId']."' target='_blank'>".$row['QuizName']."</a>";
				echo "</td>";
				echo "<td>";
				echo $row['Description'];
				echo "</td>";
				echo "</tr>";
			}
		?>
		</table>
		</div>
		<?php include_once "footer.php" ?>
	</body>
</html>
