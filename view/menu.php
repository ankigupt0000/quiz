<div id="menu">
	<ul>
		<?php
			if(isset($_SESSION['user_name'])){
		?>
		<li>
			<a href="InsertQues.php">Insert New Question</a>
		</li>
		<li>&nbsp;
		</li>
		<li>
			<a href="AddStudent.php">Add Student</a>
		</li>
		<li>
			<a href="UpdatePasswords.php">Change Student Password</a>
		</li>
		<li>
			<a href="CheckCurrentPassword.php">Check Password</a>
		</li>
		<li>
		&nbsp;
		</li>
		<li>
			<a href="CreateQuiz.php">Create Quiz</a>
		</li>
		<li>
			<a href="QuizQuestion.php">Add questions to quiz</a>
		</li>
		<li>
			<a href="activateQuiz.php">Select Active Quiz</a>
		</li>
		<li>
			<a href="addCareer.php">Add New Career Option</a>
		</li>
		<li>
			<a href="careerQuestion.php">Add questions to career </a>
		</li>
		<li>
			<a href="viewCareerOption.php">View career questions </a>
		</li>
		<li>&nbsp;
		</li>
		<li>
			<a href="viewResults.php"> View Student Result</a>
		</li>
		<?php
		}
		else
		{
		?>
		<li>
			<a href="index.php">Home</a>
		</li>
		<?php
		}
		?>
	</ul>
</div>