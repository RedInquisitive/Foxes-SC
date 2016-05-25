<?php
	include '/home/aj4057/verify_iron.php';
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

	<div id="dropdowns" style="margin: 0;">
	<form method="post" style="float: left;">
		<select name='semester' onchange='if(this.value != 0) {this.form.submit();}'>
			 <option value='Select'>Select Semester</option>
			 <option value='S2016'>Spring 2016</option>
		</select>
	</form>
	<form method="post" style="float: right;">
		<select name='period' onchange='if(this.value != 0) {this.form.submit();}'>
			 <option value='Select'>Select Period</option>
			 <option value='All'>All Periods</option>
		</select>
	</form>

	</div>
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
