<?php
$dsn = 'mysql:host=localhost; dbname=courseworks';
						$username = 'root';
						$password = '';
						$db = new PDO($dsn, $username, $password)
						or die ('Cannot connect to db');
?>