<?php

include ('database.php');
$db1 = new PDO($dsn, $username, $password);
$selected_name = $_POST['Sname'];
$selected_email = $_POST['Semail'];
$selected_password = $_POST['Spassword'];
 
$query2 = "SELECT COUNT(1) FROM students WHERE email ='".$selected_email."';";
$query = "INSERT INTO students(studentName, email, loginPass) VALUES( '$selected_name', '$selected_email', '$selected_password');";

$array = $db->query($query2);
$row = $array->fetchall();
foreach($row as $rows){
if($rows[0] > 0) {
	header("Location:registration.php");
}else{
	$db1->exec($query);
	header("Location:signin.php");
}
}
?>