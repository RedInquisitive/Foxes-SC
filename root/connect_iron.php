<?php
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); #login
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #Enable errors
} catch(PDOException $e) {
	$error = "Could not connect to the database. This should never happen.";
}
?>