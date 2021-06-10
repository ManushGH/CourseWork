<?php
session_start();
if(isset($_SESSION["id"])) {
header("Location:termselection.php");
}
?>

<!DOCTYPE html>
<html lang ="en">

<head>
	<link rel="stylesheet" href="mainStyle1.css">
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
		<a href="home.php">
         <img src="maybe.png" alt="CW Logo">
		</a>
		<h1> CourseWorks </h1>
		
	</header>
    
	<main>        
	<form action="insert.php" method="POST">
            
        <div class="container">
            
            <p><b>UGA STUDENT REGISTRATION</b></p>
            <p>Please fill in this form to create an account.</p>
            <hr> 
    
            <label for="name"><b>Full Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="Sname" id="name" onblur="checkName()">
            <span id="confirm-name" class="confirm-name"></span>
      
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="Semail" id="email" onblur="checkEmail()">
            <span id="confirm-email" class="confirm-email"></span>

            <label for="password2"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Spassword" id="password2">
            <span id="confirm-pass" class="confirm-pass"></span>

            <label for="confirm2"><b>Confirm Password</b></label>
            <input type="password" name="confirm" placeholder="Confirm Password" id="confirm2" onblur="checkConfirm()">
            <span id="confirm-message2" class="confirm-message"></span>
            <span id="final-message" class="final-message"></span>
            <hr>
    
            <input type="submit" id= "submit" class="registerbtn"  value="Submit" name="submitButton" >
        </div>

  <div class="container signin">
    <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
  </div>
    
    
</form>	
               

<script type="text/javascript">
    
    var good_color = "#66cc66";
    var bad_color  = "#ff6666";
    var bt = document.getElementById('submit');
    
    bt.disabled = true;
      
    function checkName() {
        var name = document.getElementById('name');
        var msgName = document.getElementById('confirm-name');
        
        if(name.value.length == 0) {
            bt.disabled = true;
            name.style.backgroundColor = bad_color;
            msgName.style.color = bad_color;
            msgName.innerHTML = '<p>Name is missing!</p>';            
        }
        else {
            name.style.backgroundColor = good_color;
            msgName.style.color = good_color;
            msgName.innerHTML = '<p></p>';            
        }
    }
    
    function checkEmail() {
        var email = document.getElementById('email');
        var msgEmail = document.getElementById('confirm-email');
        
        if(email.value.length == 0) {
            bt.disabled = true;
            email.style.backgroundColor = bad_color;
            msgEmail.style.color           = bad_color;
            msgEmail.innerHTML = '<p>Email is missing!</p>';            
        }
        else {
            email.style.backgroundColor = good_color;
            msgEmail.style.color = good_color;
            msgEmail.innerHTML = '<p></p>';            
        }
    }
    
    
    function checkConfirm() {
        var Tname = document.getElementById('name');
        var Temail = document.getElementById('email');
        var password = document.getElementById('password2');
        var confirm = document.getElementById('confirm2');

        var msgPass = document.getElementById('confirm-pass');
        var msgConfirm = document.getElementById('confirm-message2');
        var msgFinal = document.getElementById('final-message');
        
        if(password.value == confirm.value){
            if(Tname.value.length != 0 && Temail.value.length != 0 &&
              password.value.length != 0 && confirm.value.length != 0) {
                bt.disabled = false;
                password.style.backgroundColor = good_color;
                confirm.style.backgroundColor = good_color;
                msgConfirm.style.color = good_color;
                msgConfirm.innerHTML = '<p>Passwords Match</p>';
                msgFinal.innerHTML = '<p></p>';
            }
        }
        if(password.value.length == 0) {
            bt.disabled = true;
            password.style.backgroundColor = bad_color;
            msgConfirm.style.color = bad_color;
        }
        if(confirm.value.length == 0) {
            bt.disabled = true;
            confirm.style.backgroundColor = bad_color;
            msgConfirm.style.color = bad_color;
            msgConfirm.innerHTML = '<p>Passwords is missing!</p>';
        }
        if(password.value != confirm.value && 
           Tname.value.length != 0 && Temail.value.length != 0) {
            bt.disabled = true;
            password.style.backgroundColor = bad_color;
            confirm.style.backgroundColor = bad_color;
            msgConfirm.style.color = bad_color;
            msgConfirm.innerHTML = '<p>Passwords do not match or is missing!</p>';
        }  
        if(password.value == confirm.value && 
           (Tname.value.length == 0 || Temail.value.length == 0) &&
          password.value.length != 0 && confirm.value.length != 0) {
            bt.disabled = true;
            password.style.backgroundColor = good_color;
            confirm.style.backgroundColor = good_color;
            msgConfirm.innerHTML = '<p></p>'
            msgFinal.style.color = bad_color;
            msgFinal.innerHTML = '<p>Name or Email is missing!</p>';
        }  
    }  

</script>
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks </p>
	</footer>
</body>
</html>