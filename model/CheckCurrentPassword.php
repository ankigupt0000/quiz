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
			$database_obj=connectDB();
			$sql="select * from student";
			//echo $sql;
			foreach($database_obj->query($sql) as $row)
			{
?>			
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['rollno']; ?></td>
					<td><?php echo $row['class']; ?></td>
					<td><?php echo $row['password']; ?></td>
				</tr>
<?php			
			}
?>
			</tbody>
		</table>