<?php 
	include("database.php");
	 session_start();
	$item=$_POST['item_ID'];
	$query="DELETE FROM shoppingcart WHERE item=$item";
	$row = $db->exec($query);
	header("Location: Checkout.php");
?>