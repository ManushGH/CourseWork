<?php

include('database.php');
if (!isset($_SESSION)) {
    session_start();
}


$student_id = $_SESSION["id"];

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="stylesheet" href="mainStyle.css">
    <title> Checkout </title>
    <link href="cw_icon.png" rel="fav icon">

    <style>
		header span {
            float:right;
			padding-right:10px;
        }


        body {
            /*font-family: Arial, Helvetica, sans-serif;*/
            background-color: lightgray;
        }
        .container {
            padding: 20px;
            background-color: white;
        }
        table.table {
            border-collapse: collapse;
            text-align: left;
            line-height: 1.5;

        }

        table.table thead th {
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            color: #369;
            border-bottom: 3px solid #036;
        }

        table.table tbody th {
            width: 150px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
            background: #f3f6f7;
        }

        table.table td {
            width: 350px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        .registerbtn {

            display: inline-block;
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            padding: 16px 20px;
            width: 100%;
            transition: all 0.5s;
            cursor: pointer;
            opacity: 0.9;
            margin: 8px 0;
        }

        .delete {
            background-color: indianred;
            color: white;
            padding: 5px 1px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 45%;
            opacity: 1.0;
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
            width: 200px;
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

        .backButton span:after {

        }
        .backButton span:before {
            content: '<<';
            position: absolute;
            opacity: 0;
            top: 0;
            left: -100px;
            transition: 0.5s;
        }

        .backButton:hover span {
            padding-left: 25px;
        }

        .backButton:hover span:before {
            opacity: 1;
            right: 40px;
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
    <button class="backButton" onclick=location.href='termselection.php'><span> term selection page</span></button>
    <div class="container">
        <table class="table">
            <h1 style="text-align:left">OverView</h1>
            <thead>
            <tr>
                <th scope="cols">Semester</th>
                <th scope="cols">Course</th>
                <th scope="cols">CRN</th>
                <th scope="cols">Time</th>
                <th scope="cols">Instructor</th>
                <th scope="cols"></th>
            </tr>
            </thead>
            <tbody>
			<?php
			$query = "SELECT *
					FROM shoppingcart s
					INNER JOIN coursedetails c
					ON s.CRN = c.CRN
					INNER JOIN courses c1
					on c.courseID = c1.courseID
					WHERE s.studentID = '". $student_id . "';";
			$info = $db->query($query);
			foreach ($info as $table_row){
             ?>
            <tr>
                <th scope="row">
                <?php echo  $table_row['semester'];?>
                </th>
                <td><?php 
                //$courseCRN = $table_row['CRN'];
                //$query = "SELECT password FROM courses WHERE courseID = $courseCRN limit 1";
                //$info = $db->query($query);
                //$info = $info->fetch();

                echo $table_row['courseName'];
                ?></td>
                <td><?php echo $table_row['CRN']?></td>
                <td>
                <?php
                //$courseTime = $table_row['CRN'];
                //$query = "SELECT password FROM coursedetails WHERE CRN = $courseTime limit 1";
                //$info = $db->query($query);
                //$info = $info->fetch();

                echo $table_row['courseTime'];
				echo "\x20\x20\x20 - \x20\x20\x20"; 
				echo $table_row['courseDay'];
                ?></td>
                <td><?php
                //$instructor = $table_row['CRN'];
                //$query = "SELECT password FROM coursedetails WHERE CRN = $courseCRN limit 1";
                //$info = $db->query($query);
                //$info = $info->fetch();

                echo $table_row['courseInstructor'];
                ?></td>
                <td>
                    <form action="deleteC.php" method="post">
						<input type="submit" value="Delete">
                        <input type="hidden" name="item_ID" value="<?php echo $table_row['item']; ?>">
                                
                    </form>
                </td>
            </tr>   
            <?php } ?>

            </tbody>
        </table>
        <!--it block register after 5 class-->
            <form action="process_register.php" method="post">
                <input type="hidden" name="studentID" value="<?php echo $student_id; ?>">
                <input type="submit" class="registerbtn" value="Register">
            </form>
    </div>

</main>
<footer>
    <p> &copy; 2019 UGA! </p>
</footer>
</body>
</html>
