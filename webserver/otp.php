<?php
echo "This feature is disabled."; die(); #Comment this out to generate a coach.
include '/home/aj4057/config_iron.php';

#Username and password of new coach.
$username = "Test";
$password = "superSecretPasswordExample2";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	$error = "Could not connect to the database. This should never happen.";
	break;
}


$hashword = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO COACH (username, password) VALUES (:username, :hashword)");
$stmt->execute(array('username' => $username,
		     'hashword' => $hashword));
?>