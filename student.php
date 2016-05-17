<!-- 
<?php
include '/home/aj4057/config.php'; #Define $servername $username $password $dbname and $configready here.
include '/home/aj4057/indexkeys.php'; #Index keys that are used. For example, Index::REQUEST is defined here.

do {
session_start(); #Starting Session
$error=''; #Variable To Store Error Message

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); #login
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #Enable errors
} catch(PDOException $e) {
	$error = "Could not connect to the database. This should never happen.";
	break;
}

if (!empty($_POST)) {
	if(!(array_key_exists(Student::ID,$_POST))) {
		$error = "You need to enter a Student ID";
		break;
	}
	if($_POST[Student::ID] === '') {
		$error = "You need to enter a Student ID";
		break;
	}
	$stmt = $conn->prepare("SELECT STUDENT_ID FROM STUDENT WHERE STUDENT_ID = :id"); #select data
	$stmt->execute(array('id' => $_POST[Student::ID])); #based on the ID
	$row = $stmt->fetch();
	if($row["STUDENT_ID"] !== $_POST[Student::ID]) {
		$error = "The username or password is incorrect!"; #Deny it.
		break;
	}
	$_SESSION['login_user'] = $row["STUDENT_ID"]; #Initializing Session
	$_SESSION['timestamp'] = date("Y-m-d H:i:s"); #Initializing Session
	$_SESSION['valid'] = "Student";
	header("location: student/index.php"); #Redirecting To Other Page
	$conn = null;
}

if(isset($_SESSION['login_user']) && $_SESSION['valid'] = "Student"){
	header("location: student/index.php");
}
} while (0); #but it works!
?>
-->
<!DOCTYPE html>
<html>
<header>
	<title>Student Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</header>
<body>
	<div id="main">
		<div id="login">
			<h1>Student Login</h1>
			<form class="login"  method="post">
				<h3>Student ID: </h3><div class="padding"><input type="password" id="username" name="student_id"></div><br>
				<div class="padding"><input type="submit" value=" Enter "></div>
				<span id="error"><?php echo $error?></span>
			</form>
			<form class="login" action="coach.php">
				<div class="padding"><input type="submit" value=" I'm actually a coach "></div>
			</form>
		</div>
	</div>
</body>
</html>