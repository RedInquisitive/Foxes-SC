<!-- 
<?php
include '/home/aj4057/config_iron.php'; #Define $servername $username $password $dbname and $configready here.

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
	if(!(array_key_exists("username",$_POST)
	  && array_key_exists("password",$_POST))) {
		$error = "You need to enter the username and password.";
		break;
	}
	
	if($_POST["username"] === '' || $_POST["password"] === '') {
		$error = "You need to enter the username and password.";
		break;
	}
	
	$stmt = $conn->prepare("SELECT USERNAME, PASSWORD FROM COACH WHERE USERNAME = :username");
	$stmt->execute(array('username' => $_POST["username"]));
	$row = $stmt->fetch();
	
	if(!(password_verify($_POST["password"], $row["PASSWORD"]))) {
		$error = "The username or password is incorrect!"; 
		break;
	}
	
	$_SESSION['login_user'] = $row["USERNAME"]; #Initializing Session
	$_SESSION['timestamp'] = date("Y-m-d H:i:s"); #Initializing Session
	$_SESSION['valid'] = "Coach";
	
	header("location: admin/index.php"); #Redirecting To Other Page
	$conn = null;
	die();
}

if(isset($_SESSION['login_user']) && $_SESSION['valid'] = "Coach"){
	header("location: coach/index.php");
}
} while (0); #but it works!
?>
-->
<!DOCTYPE html>
<html>
<header>
	<title>Coach Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</header>
<body>
	<div id="main">
		<div id="login">
			<h1>Coach Login</h1>
			<form class="login" method="post">
				<h3>Coach Username: </h3><div class="padding"><input type="text" id="username" name="username"></div><br>
				<h3>Password: </h3><div class="padding"><input type="password" id="password" name="password"></div><br>
				<div class="padding"><input type="submit" value=" Login "></div>
				<span id="error"><?php echo $error?></span>
			</form>
			<form class="login" action="student.php">
				<div class="padding"><input type="submit" value=" I'm actually a student "></div>
			</form>
		</div>
	</div>
</body>
</html>