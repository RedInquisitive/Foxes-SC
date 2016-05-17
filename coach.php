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
	if(!(array_key_exists(Coach::USERNAME,$_POST)
	  && array_key_exists(Coach::PASSWORD,$_POST))) {
		$error = "You need to enter the username and password.";
		break;
	}
	if($_POST[Coach::USERNAME] === '' || $_POST[Coach::PASSWORD] === '' ) {
		$error = "You need to enter the username and password.";
		break;
	}
	$stmt = $conn->prepare("SELECT USERNAME, PASSWORD FROM COACH WHERE USERNAME = :username"); #select data
	$stmt->execute(array('username' => $_POST[Coach::USERNAME])); #based on the room
	$row = $stmt->fetch();
	if($row["PASSWORD"] !== $_POST[Index::PASSWORD]) { #if the password hash is not the stored hash
		$error = "The username or password is incorrect!"; #Deny it.
		break;
	}
	$_SESSION['login_user'] = $row["USERNAME"]; #Initializing Session
	$_SESSION['timestamp'] = date("Y-m-d H:i:s"); #Initializing Session
	$_SESSION['valid'] = "Coach";
	header("location: admin/index.php"); #Redirecting To Other Page
	$conn = null;
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
				<h3>Coach Username: </h3><div class="padding"><input type="text" id="room" name="room"></div><br>
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