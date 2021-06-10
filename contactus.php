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
	</header>
	<main>
		<div id="content-wrap">
		<button class="backButton" onclick=location.href="home.php"><span>Previous page</span></button>
		 <form>
		<fieldset id="oneBox">	
			<legend>Enter your information</legend>
				<label for="name">* Full Name: </label>
					<input type="name" name="Full Name" id="name" required><br>
				<label for="email">* E-Mail: </label>
					<input type="email" name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
		</fieldset>
		
		<fieldset id="boxFour">
			<legend>Describe your issue:</legend>
				<p>Include any additional information that will help us help you.<img width="30px" src="juicer.png" alt="XQCL"></p>
				<textarea name="comments"></textarea>	
		</fieldset>
		<fieldset id="boxFive">
			<legend>Process your information</legend>
				<input type="submit" id="button" value="Submit now">
				<input type="reset" id="reset" value="Start over"> 	
		</fieldset>
		</form>
		</div>
		<!--<button class="submitButton" ><span>Submit</span></button>-->
	</main>
	<footer>
		<p> &copy; 2021 CourseWorks! </p>
	</footer>
</body>
</html>