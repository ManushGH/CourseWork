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
		<a href="home.php">
         <img src="maybe.png" alt="CW Logo">
		</a>
		<h1> CourseWorks </h1>
		<span class="logOut"> Welcome <?php echo $_SESSION["name"]; ?>
		<form action="logout.php">
			<input type="submit" value="Logout" />
		</form>
		</span>
	</header>
	<main>
	<div id="content-wrap">
		<button class="backButton" onclick=location.href='termselection.php'><span>Term selection</span></button>
			<form action="addC.php" method="post">
				<?php 
		if(isset($_POST['submitButton'])){
			$selected_val = $_POST['Course'];
			echo '<p> Selected Course: ' . $selected_val . '</p>';
		}
		?>
                <label for="Courses">Instructors</label>
				<div class="Subjectselect">
                    <select name="Instructor" id="Instructor">
						<?php 
						$dsn = 'mysql:host=localhost; dbname=courseworks';
						$username = 'root';
						$password = '';
						$db = new PDO($dsn, $username, $password)
						or die ('Cannot connect to db');
						$term = $_SESSION['varname'];
						if(isset($_POST['submitButton'])){
							$selected_val = $_POST['Course'];
							$query = "SELECT *  FROM coursedetails c 
									INNER JOIN courses c1
									ON c1.courseID = c.courseID
									WHERE c1.courseName = '". $selected_val . "'
									AND c1.semester = '".$term. "';";
							$names = $db->query($query);
							foreach ($names as $name){
								if ($name['availableSeats']>0) {
								echo '<option name="instructorDetail" value="'.$name['CRN'].'">' . $name['courseInstructor'] . '&nbsp-&nbsp' .$name['courseTime'].
								'&nbsp' .$name['courseDay'].'</option>';
								}
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
				<input type="submit" class="submitButton" name="submitButton" value="Add">
			</form>
			
		<!--<button class="submitButton" ><span>Submit</span></button>-->
		</div>
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks! </p>
	</footer>
</body>
</html>