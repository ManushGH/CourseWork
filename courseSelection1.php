<?php
session_start();
?>

<html lang ="en">

<head>
	<link rel="stylesheet" href="manusStyle.css">
	<title> University of Georgia </title>
	<link href = "cw_icon.png" rel = "fav icon">
</head>
<body>
	<header>
		<img src="maybe.png" alt="CW Logo">
		<h1> CourseWorks </h1>
		<span class="logOut"> Welcome <?php echo $_SESSION["name"]; ?>
		<form action="logout.php">
			<input type="submit" value="Logout" />
		</form>
		</span>
	</header>
	<main>
	<div id="content-wrap">
		<button class="backButton" onclick=location.href='termselection.php'><span>Term Selection</span></button>
			<form action="instructorSelection.php" method="post">
				<?php 
		if(isset($_POST['submitButton'])){
			$selected_val = $_POST['Subject'];
			echo '<p> Selected Subject: ' . $selected_val . '</p>';
		}
		?>
                <label for="Courses">Course</label>
				<div class="Subjectselect">
                    <select name="Course" id="Course">
						<?php 
						$dsn = 'mysql:host=localhost; dbname=courseworks';
						$username = 'root';
						$password = '';
						$db = new PDO($dsn, $username, $password)
						or die ('Cannot connect to db');
						$term = $_SESSION['varname'];
						if(isset($_POST['submitButton'])){
							$selected_val = $_POST['Subject'];
							$query = "SELECT courseName FROM courses c1 
									INNER JOIN subjects c
									ON c.subjectID = c1.subjectID
									WHERE c1.semester = '".$term. "'
									AND c.subjectName = '".$selected_val."';";
							$names = $db->query($query);
							foreach ($names as $name){
								echo '<option value="'.$name['courseName'].'">' . $name['courseName'] . '</option>';
							}
						}
						/*
						foreach ($names as $name){
							echo "<option value=\"owner1\">" . $name['Name'] . "</option>";
						}*/
						?>
					</select>
				</div>
				<br>
				<input type="submit" class="submitButton" name="submitButton" value="Next">
			</form>
			
		<!--<button class="submitButton" ><span>Submit</span></button>-->
		</div>
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks! </p>
	</footer>
</body>
</html>