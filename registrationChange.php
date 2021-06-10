<?php
session_start();
if(isset($_SESSION["id"])) {
header("Location:termselection.php");
}
?>

<html lang ="en">

<head>
	<link rel="stylesheet" href="mainStyle.css">
	<title> University of Georgia </title>
	<link href = "cw_icon.png" rel = "fav icon">

    <style>
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
        
</style>


    
</head>
    
<body>
	<header>
		<img src="ok.png" alt="UGA Logo">
		<h1> CourseWorks </h1>
		
	</header>
    
	<main>        
	<form action="insert.php" method="POST">
            
        <div class="container">
            
			<hr>
            <p><b>UGA STUDENT REGISTRATION</b></p>
            <p>Please fill in this form to create an account.</p>
    
            <label for="name"><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="Sname" id="name" onkeyup='checkName();'>
            <span id="confirm-name" class="confirm-name"></span>
			<br>
            
      
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="Semail" id="email" onkeyup='checkEmail();'>
            <span id="confirm-email" class="confirm-email"></span>
			<br>

            <label for="password2"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Spassword" id="password2" onkeyup='checkPass();'>
            <span id="confirm-pass" class="confirm-pass"></span>

            <label for="confirm2"><b>Confirm Password</b></label>
            <input type="password" name="confirm" placeholder="Confirm Password" id="confirm2" onkeyup='checkPass();'>
            <span id="confirm-message2" class="confirm-message"></span>
    
    
            <input type="submit" id= "submit" class="registerbtn"  value="Submit" name="submitButton" >
			</hr>
        </div>

  <div class="container signin">
    <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
  </div>
    
    
</form>	
               

<script type="text/javascript">
    
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var pass1 = document.getElementById('password2');
    var pass2 = document.getElementById('confirm2');

    var msgName = document.getElementById('confirm-name');
    var msgEmail = document.getElementById('confirm-email');
    var msgPass = document.getElementById('confirm-pass');
    var message = document.getElementById('confirm-message2');
    var good_color = "#66cc66";
    var bad_color  = "#ff6666";
    var bt = document.getElementById('submit');
    
function checkPass()
{
    var password = document.getElementById('password2');
    var confirm  = document.getElementById('confirm2');
    
    if(password.value == confirm.value){
        bt.disabled = false;
        confirm.style.backgroundColor = good_color;
        message.style.color           = good_color;
        message.innerHTML             = '<p>Passwords Match</p>';
    }else{
        bt.disabled = true;
        confirm.style.backgroundColor = bad_color;
        message.style.color           = bad_color;
        message.innerHTML = '<p>Passwords Do Not Match</p>';
    }
    
    if(pass1.value.length == 0)
        {
            bt.disabled = true;
            
        }
} 
 
function checkName() {
    if(name.value.length == 0) {
        bt.disabled = true;
        name.style.backgroundColor = bad_color;
        msgName.style.color           = bad_color;
        msgName.innerHTML = '<p>Name is missing!</p>';            
    }
    else {
        bt.disabled = false;
        name.style.backgroundColor = good_color;
        msgName.style.color           = good_color;
        msgName.innerHTML = '<p></p>';            

    }
}
    
function checkEmail() {
    if(email.value.length == 0) {
        bt.disabled = true;
        email.style.backgroundColor = bad_color;
        msgEmail.style.color           = bad_color;
        msgEmail.innerHTML = '<p>Email is missing!</p>';            
    }
    else {
        bt.disabled = false;
        email.style.backgroundColor = good_color;
        msgEmail.style.color           = good_color;
        msgEmail.innerHTML = '<p></p>';            
    }
}

</script>
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks </p>
	</footer>
</body>
</html>