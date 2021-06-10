<?php
session_start();
$_SESSION['varname'] = $_POST['radio'];
?>

<html lang ="en">

<script>
function goBack() {
  window.history.back();
}
</script>

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
		<button class="backButton" onclick="goBack()"><span>Previous page</span></button>
		 
			<form action="courseSelection1.php" method="post">
                <label for="Courses">Subject</label>
				<div class="Subjectselect">
                    <select name="Subject" class="trialandy" id="Subject" onchange="findmyvalue()">
						<?php 
						$dsn = 'mysql:host=localhost; dbname=courseworks';
						$username = 'root';
						$password = '';
						$db = new PDO($dsn, $username, $password)
						or die ('Cannot connect to db');
						$query = "SELECT * FROM subjects";
						$names = $db->query($query);
						foreach ($names as $name){
							echo '<option value="'.$name['subjectName'].'">' . $name['subjectName'] . '</option>';
						}
						if(isset($_POST['submitButton'])){
							$selected_val = $_POST['Subject'];
							echo "<script type=\"text/javascript\">
							$(\"div.trialandy select\").val(\"". $selected_val ."\").change();
							</script>";
						}
						?>
					</select>
					</div>
				<br>
				<input type="submit" class="submitButton" name="submitButton" value="Next">
			</form>
		</div>
		<!--<button class="submitButton" ><span>Submit</span></button>-->
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks! </p>
	</footer>
</body>
</html>