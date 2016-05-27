<?php
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/config_iron.php'; #Connect to db.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Landing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="navbar">
	<div id="header" style="margin: 0;">
		<a href="projector.php"><div class="headlink" id="projector"><div class="textheadlink">Projector View</div></div></a>
		<a href="laptop.php"><div class="headlink" id="laptop"><div class="textheadlink">Laptop View</div></div></a>
		<a href="links.php"><div class="headlink" id="links"><div class="textheadlink">Modify Links</div></div></a>
		<a href="students.php"><div class="headlink" id="students"><div class="textheadlink">Modify Students</div></div></a>
		<a href="classes.php"><div class="headlink" id="classes"><div class="textheadlink">Modify Classes</div></div></a>
	</div>
	<?php include '/home/aj4057/require_select_iron.php';?>
</div>

<div id="body">
	<h1>Results for: (period, semester)</h1>
	<table>
		<tr>
			<th colspan="5">Dead Lift</th>
		</tr><tr>
			<td></td>
			<td>Pre</td>
			<td>Post</td>
			<td>Weight</td>
			<td>Precent Improvement</td>
		</tr><tr>
			<td>Male</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr><tr>
			<td>Female</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<th colspan="5">Bench</th>
		</tr><tr>
			<td></td>
			<td>Pre</td>
			<td>Post</td>
			<td>Weight</td>
			<td>Precent Improvement</td>
		</tr><tr>
			<td>Male</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr><tr>
			<td>Female</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<th colspan="5">Back Squat</th>
		</tr><tr>
			<td></td>
			<td>Pre</td>
			<td>Post</td>
			<td>Weight</td>
			<td>Precent Improvement</td>
		</tr><tr>
			<td>Male</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr><tr>
			<td>Female</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>
</body>
