<!--
<?php
#INCLUDE AND START SESSION
include '/home/aj4057/config.php'; #Define $servername $username $password $dbname and $configready here.
session_start();
include '/home/aj4057/checkaccess.php';

#Do while loop allows me to terminate the task at hand.
do {
#Connect to database
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	$error = "Could not connect to the database. This should never happen.";
	break;
}

}
?>
-->
<!DOCTYPE html>
<html>
<head>
	<title>Laptop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>
	var confirmOnPageExit = function (e) {
		e = e || window.event; // If we haven't been passed the event get the window.event
		var message = 'Leaving this page will require the Coach to login again!';
		if (e) { // For IE6-8 and Firefox prior to version 4
			e.returnValue = message;
		}
		return message; // For Chrome, Safari, IE8+ and Opera 12+
	};
	window.onbeforeunload = confirmOnPageExit;
	</script>
</head>
<body>
<div id="body">
	<h1>Laptop View</h1>
	<div class="center" style="font-size: 22px; margin-bottom: 20px;">
		<span>Leaving this page will require the Coach to login again!</span>
	</div>
	<form method="post">
		<table>
			<tr>
				<th>Name</th>
				<th>Workout</th>
			</tr><tr>
				<td>
					<label><input type="radio" name="name" value="bob" checked>bob</label><br>
				</td>
				<td>
					<h1>Enter your info!</h1>
					<select name='period' style="width: 100% !important; min-width: 10px !important;">
						 <option value='All' style="width: 100% !important;">Week 1</option>
					</select>
					<h3 class="titlepadding">Dead Lift</h3>
					<input id="deadlift"	class="text" 		type="number" 		name="deadlift" placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Bench</h3>
					<input id="bench"		class="text" 		type="number" 		name="bench" 	placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Squat</h3>
					<input id="squat"		class="text" 		type="number" 		name="squat" 	placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Student ID</h3>
					<input id="id"			class="text" 		type="password" 	name="id" 		placeholder="Student ID"><br>
					<div class="padding"><input type="submit" value="Save!" onclick="window.onbeforeunload = null;"></div>
				</td>
			</tr>
		</table>
	</form> 
</div>
<div class="center">
	<div style="margin: 80px 0 20px; height: 100px;">
		<a href="../coach.php"><div class="headlink"><div class="textheadlink">Leave this page and return to the login screen.</div></div></a>
	</div>
</div>
</body>