<?php
include("database.php");
session_start();

$CRN = $_POST['Instructor'];
$sID = $_SESSION["id"];

$query = "INSERT INTO shoppingcart
    (studentID, CRN) VALUES
    ('$sID', '$CRN')";
$db->exec($query);

header("Location:Checkout.php");
?>