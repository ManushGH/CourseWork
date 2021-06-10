<html>
<head>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("45271.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.title {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.title2 {
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.title2 p{
  font-weight:bold;
  font-size:120%;
  background-color: white;
}

.submitButton {
  background-color: #f4511e;
  border: 2px solid #f4511e;
  border-radius: 4px;
  color: white;
	padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  width: 100px;
  font-size: 16px;
  margin: 5px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.submitButton:hover {
	border: 2px solid #f4511e;
	background-color: white;
	color: #f4511e;
}

h1 {
  color: red;
  background-color: white;
  font-family: "Lucida Console", "Courier New", monospace;
}
</style>
</head>
<body>

<div class="bg">
	<div class="title">
	<h1> CourseWorks </h1>
	</div>
	<div class="centered">
	<form action="signin.php">
	<input type="submit" class="submitButton" name="submitButton" value="SignIn">
	</form>
	<form action="contactus.php">
	<input type="submit" class="submitButton" name="submitButton" value="Contact Us">
	</form>
	<?php 
	session_start();
	if(isset($_SESSION["id"])) { ?>
	<span class="logOut"> Welcome <?php echo $_SESSION["name"]; ?>
		<form action="logout.php">
			<input type="submit" value="Logout" />
		</form>
	</span>
	<?php
    }
	?>
	</div>
	<div class="title2">
	<p> &copy; 2021 CourseWorks! </p>
	</div>
</div>

</body>
</html>
