<?php
	$host = "127.0.0.1";
	$db = "WEB";
	$user = "root";
	$password = '';

	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

	try {
		$pdo = new PDO($dsn, $user, $password);

		if ($pdo) {
			//echo "Connected to the $db database successfully!";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>