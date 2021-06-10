<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        include ('database.php');
        $query = "SELECT * FROM students WHERE email='" . $_POST["email"] . "' and loginPass = '". $_POST["password"]."'";
        $row  = $db->query($query)->fetch(PDO::FETCH_BOTH);
        if(is_array($row)) {
        $_SESSION["id"] = $row['studentID'];
        $_SESSION["name"] = $row['studentName'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:termselection.php");
    }
?>


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
    <form method="post" action="">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
  <div class="container">
    <p><b>UGA STUDENT SIGN-IN</b></p>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" onblur="checkEmail()">
      <span id="confirm-email" class="confirm-email"></span>  
      
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" onblur="checkPassword()">
      <span id="confirm-pass" class="confirm-pass"></span>
              
      
    <hr>

    <button type="submit" id="submit" class="registerbtn" >Sign-In</button>
  </div>

  <div class="container signin">
    <p>Don't have an account? <a href="registration.php">Register</a>.</p>
  </div>
</form>	
    </main>


    <script type="text/javascript">
        var good_color = "#66cc66";
        var bad_color  = "#ff6666";
        var bt = document.getElementById('submit');
        bt.disabled = true;
    
        function checkEmail() {
            var email = document.getElementById('email');
            var msgEmail = document.getElementById('confirm-email');
            
            var Tpass = document.getElementById('psw');
            var TmsgPass = document.getElementById('confirm-pass');
            
            if(Tpass.value.length != 0 && email.value.length != 0) {
                bt.disabled = false;
                
                msgEmail.innerHTML = '<p></p>';
                TmsgPass.innerHTML = '<p></p>';    
            }
            if(email.value.length == 0) {
                bt.disabled = true;
                email.style.backgroundColor = bad_color;
                msgEmail.style.color = bad_color;
                msgEmail.innerHTML = '<p>Email is missing!</p>';            
            }
            if(email.value.length != 0) {
                email.style.backgroundColor = good_color;
                msgEmail.style.color = good_color;
                msgEmail.innerHTML = '<p></p>';            
            }
        }
        
        function checkPassword() {
            var pass = document.getElementById('psw');
            var msgPass = document.getElementById('confirm-pass');
            
            var Temail = document.getElementById('email');
            var TmsgEmail = document.getElementById('confirm-email');

            if(pass.value.length != 0 && Temail.value.length != 0) {
                bt.disabled = false;
                
                TmsgEmail.innerHTML = '<p></p>';
                msgPass.innerHTML = '<p></p>';    
            }
            
            if(pass.value.length == 0) {
                bt.disabled = true;
                pass.style.backgroundColor = bad_color;
                msgPass.style.color = bad_color;
                msgPass.innerHTML = '<p>Password is missing!</p>';            
            }
            if(pass.value.length != 0) {
                pass.style.backgroundColor = good_color;
                msgPass.style.color = good_color;
                msgPass.innerHTML = '<p></p>';            
            }
        }
        
        
    </script>

    
    
    <footer>
        <p> &copy; 2021 CourseWorks </p>
    </footer>
</body>
</html>