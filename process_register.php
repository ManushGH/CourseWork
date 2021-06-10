<?php
include("database.php");
session_start();

$sID = $_SESSION["id"];

$query = "
			INSERT INTO enrollments
			(studentID, CRN, semester, enrolledHours) 
			SELECT c2.studentID, s.CRN, c.semester, c.courseHours
			FROM shoppingcart s
			INNER JOIN students c2 ON c2.studentID = '".$sID. "'
			INNER JOIN coursedetails c1 ON s.CRN = c1.CRN
			INNER JOIN courses c ON c.courseID = c1.courseID
			WHERE s.studentID = '".$sID. "'
			AND NOT EXISTS ( SELECT 1 FROM enrollments e
					INNER JOIN shoppingcart s
					ON e.studentID = '".$sID."'
					WHERE e.CRN = s.CRN);
					
		DELETE FROM shoppingcart 
		WHERE studentID = '".$sID. "'";

$db->query($query);

header("Location:confirm.php");
?>