<?php
$weekNeeded = TRUE;
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/config_iron.php'; #Connect to db.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projector</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="navbar">
	<div id="exit" style="margin: 0;">
		<a href="index.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">Exit</div></div></a>
	</div>
	<?php include '/home/aj4057/require_select_iron.php';?>
</div>
<?php
$reps = 0;
$adder = 0;

if((int)$_SESSION["WEEK_GLOBAL"] % 3 == "1") {
	$reps = 8;
}
if((int)$_SESSION["WEEK_GLOBAL"] % 3 == "2") {
	$reps = 6;
	$adder = 0.05;
}
if((int)$_SESSION["WEEK_GLOBAL"] % 3 == "0") {
	$reps = 4;
	$adder = 0.1;
}
?>
<table>
	<tr>
		<th>Name</th>
		<th colspan="4">Dead Lift</th>
		<th colspan="4">Bench</th>
		<th colspan="4">Back Squat</th>
	</tr><tr>
		<th>Reps</th>
		<th colspan="2">3x<?php echo($reps); ?></th>
		<th>MAX</th>
		<th>#</th>
		<th colspan="2">3x<?php echo($reps); ?></th>
		<th>MAX</th>
		<th>#</th>
		<th colspan="2">3x<?php echo($reps); ?></th>
		<th>MAX</th>
		<th>#</th>
	</tr>
<?php
if($_SESSION["WEEK_GLOBAL"] < 4) {
	$stmt = $conn->prepare("SELECT * FROM STUDENT$ WHERE COACH = :coach AND SEMESTER = :semester AND PERIOD = :period");
	$stmt->execute(array('coach' => $_SESSION['login_user'],
						 'semester' => $_SESSION["SEMESTER_GLOBAL"],
						 'period' => $_SESSION["PERIOD_GLOBAL"]));
	$all = $stmt->fetchAll();
	
	$quarry = "SELECT * FROM DATA WHERE WEEK = :week AND (";
	$params = array();
	$params["week"] = $_SESSION["WEEK_GLOBAL"];
	$i = 0;
	foreach($all as $row) {
		if ($row !== end($all)) {
			$quarry = $quarry . "LINKED_ID = :p$i OR ";
			$params["p$i"] = $row["ID"];
		} else {
			$quarry = $quarry . "LINKED_ID = :p$i);";
			$params["p$i"] = $row["ID"];
		}
		$i++;
	}
	$stmt = $conn->prepare($quarry);
	$stmt->execute($params);
	$alreadyHasData = $stmt->fetchAll();
	
	foreach($all as $row) {
		$echoed = FALSE;
		foreach($alreadyHasData as $rowDone) {
			if($rowDone["LINKED_ID"] === $row["ID"]) {
				$echoed = TRUE; 
?>
	<tr>
		<td><?php echo($row["NAME"]); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: #9F9;"><?php echo($rowDone["DEADLIFT"]); ?></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: #9F9;"><?php echo($rowDone["BENCH"]); ?></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: #9F9;"><?php echo($rowDone["BACKSQUAT"]); ?></td>
	</tr>
<?php
			}
		}
		if($echoed === FALSE) { 
?>
	<tr>
		<td><?php echo($row["NAME"]); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_DEADLIFT"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: red;"></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BENCH"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: red;"></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.55 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.65 + $adder))/5 + 0.5)*5); ?></td>
		<td><?php echo((int)(($row["BASE_BACKSQUAT"] * (0.75 + $adder))/5 + 0.5)*5); ?></td>
		<td style="background-color: red;"></td>
	</tr>
<?php
		}
	}
}
?>
</table>
</body>