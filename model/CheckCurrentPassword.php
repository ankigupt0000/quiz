		<table>
			<thead>
				<th>Student Name</th>
				<th>Student Roll Number</th>
				<th>Class</th>
				<th>Password</th>
			</thead>
			<tbody>

<?php
		require_once('../model/db.php');
		function GetPassword(){
			$database_obj=connectDB();
			$sql="select * from student";
			//echo $sql;
			foreach($database_obj->query($sql) as $row)
			{
?>			
				<tr>
					<td><?php echo $quesrow['name']; ?></td>
					<td><?php echo $quesrow['rollno']; ?></td>
					<td><?php echo $quesrow['class']; ?></td>
					<td><?php echo $quesrow['password']; ?></td>
				</tr>
<?php			
			}
		}
?>
			</tbody>
		</table>