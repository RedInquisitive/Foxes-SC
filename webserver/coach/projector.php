<?php
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
<div id="body">
	<h1>Results for: (period, semester)</h1>
	<table>
		<tr>
			<th>Name</th>
			<th colspan="3">Dead Lift</th>
			<th colspan="3">Bench</th>
			<th colspan="3">Back Squat</th>
		</tr><tr>
			<th>Reps</th>
			<th>x8</th>
			<th>x6</th>
			<th>MAX</th>
			<th>x8</th>
			<th>x6</th>
			<th>MAX</th>
			<th>x8</th>
			<th>x6</th>
			<th>MAX</th>
		</tr><tr>
			<td>Bob</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
			<td>XXX</td>
		</tr>
	</table>
</div>
</body>