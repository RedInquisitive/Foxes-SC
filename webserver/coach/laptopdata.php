<?php
$skip = true; 
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/config_iron.php'; #Connect to db.
if($_SESSION['valid'] === "Coach" || $_SESSION['valid'] === "Laptop") {
	if(!isset($_SESSION["SEMESTER_GLOBAL"]) || !isset($_SESSION["PERIOD_GLOBAL"]) || !isset($_SESSION["WEEK_GLOBAL"])) {
		header("Location: laptop.php");
		die();
	}
} else {
	logout();
	die();	
}
$_SESSION['valid'] = "Laptop";

$weekBuilder = array();
for($week = 1; $week <= 16; $week++) {
	$weekBuilder[] = 
	'<option value="' . $week .
	'" style="width: 100%;">Week ' . $week . '</option>';
}
if(isset($_SESSION["WEEK_GLOBAL"])) {
	$key = array_search('<option value="' .
	$_SESSION["WEEK_GLOBAL"] . '" style="width: 100%;">Week ' .
	$_SESSION["WEEK_GLOBAL"] . '</option>', $weekBuilder);
	
	if($key !== FALSE) {
		$weekBuilder[$key] = 
		'<option selected="selected" value="' .
		$_SESSION["WEEK_GLOBAL"] . '" style="width: 100%;">Week ' .
		$_SESSION["WEEK_GLOBAL"] . '</option>';
	}
}

$stmt = $conn->prepare("SELECT * FROM STUDENT$ WHERE COACH = :coach AND SEMESTER = :semester AND PERIOD = :period");
$stmt->execute(array('coach' => $_SESSION['login_user'],
					 'semester' => $_SESSION["SEMESTER_GLOBAL"],
					 'period' => $_SESSION["PERIOD_GLOBAL"]));
$all = $stmt->fetchAll();
?>
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
	<h1><?php echo($_SESSION["SEMESTER_GLOBAL"] . ", " . $_SESSION["PERIOD_GLOBAL"] . "<br>Suggested week: " . $_SESSION["WEEK_GLOBAL"]); ?></h1>
	<div class="center" style="font-size: 22px; margin-bottom: 20px;">
		<span>Leaving this page will require the Coach to login again!</span>
	</div>
	<div class="center">
		<h3 class="titlepadding">If needed, you can change the week here.</h3>
		<form method="post">
			<select name='WEEK_LOCAL'  class="classestext" onchange='if(this.value != 0) {window.onbeforeunload = null; this.form.submit();}'>
				<?php foreach($weekBuilder as $row) {echo($row);} ?>
			</select>
		</form>
	</div>
	<form method="post" autocomplete="off">
		<table>
			<tr>
				<th>Name</th>
				<th>Workout</th>
			</tr><tr>
				<td>
					<?php
					foreach($all as $row) {
					?>
<label style="background-color: lime;"><input type="radio" name="name" value="<?php echo($row["ID"]); ?>"><?php echo($row["NAME"]); ?></label><br>
					<?php } ?> 
				</td>
				<td>
					<h3 class="titlepadding">Dead Lift</h3>
					<input class="text" 		type="number" 		name="DEADLIFT" 	placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Bench</h3>
					<input class="text" 		type="number" 		name="BENCH" 		placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Squat</h3>
					<input class="text" 		type="number" 		name="SQUAT" 		placeholder="Enter Reps Here"><br>
					<h3 class="titlepadding">Student ID</h3>
					<input class="text" 		type="password" 	name="STUDENT_ID" 	placeholder="Student ID" ><br>
					<div class="padding"><input type="submit" value="Save!" onclick="window.onbeforeunload = null;"></div>
				</td>
			</tr>
		</table>
	</form> 
</div>
<div class="center">
	<div style="margin: 80px 0 20px; height: 100px;">
		<a href="../logout.php"><div class="headlink"><div class="textheadlink">Leave this page and return to the login screen.</div></div></a>
	</div>
</div>
</body>