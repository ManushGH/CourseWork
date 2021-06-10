<?php
session_start();
?>

<html lang ="en">

<head>
	<link rel="stylesheet" href="mainStyle1.css">
	<title> University of Georgia </title>
	<link href = "cw_icon.png" rel = "fav icon">

    <style>
        
        header span {
            float:right;
			padding-right:10px;
        }
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: lightgray;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: indianred;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.backButton {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: 2px solid #f4511e;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.backButton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.backButton span:before {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.backButton:hover span {
  padding-right: 25px;
}

.backButton:hover span:before {
  opacity: 1;
  right: 0;
}

.backButton:hover {
	border: 2px solid #f4511e;
	background-color: white;
	color: #f4511e;
}
</style>
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
	<button class="backButton" onclick=location.href='Checkout.php'><span> Checkout</span></button>
	<form action="courseSelection.php" method="post">
  <div class="container">
    <h1>Term Selection</h1>
    <hr>
        <p>Select Term</p>
		<label>
			<input type="radio" id="Fall" name="radio" value="Fall 2021" checked>Fall 2021
		</label>
		<br>
		<label>
			<input type="radio" id="Spring" name="radio" value="Spring 2022">Spring 2022
		</label>
		<input type="submit" name="submit" class="registerbtn" value="Submit">
    <hr>
  </div>
  
  <div class="container signin">
    
  </div>
</form>	
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks</p>
	</footer>
</body>
</html>