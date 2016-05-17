<!--
<?php
#INCLUDE AND START SESSION
include '/home/aj4057/config.php'; #Define $servername $username $password $dbname and $configready here.
session_start();
if(!isset($_SESSION['login_user']) || !isset($_SESSION['timestamp']) || !isset($_SESSION['valid'])) { 
	header("location: logout.php");
	die();
}

if(strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['timestamp']) > 60*60 ){
	$_SESSION['valid'] = "false"; //Makes sure the session is killed.
	header("location: logout.php");
	die();
}

if($_SESSION['valid'] !== "Coach") {
	header("location: logout.php");
	die();
}

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
	<title>Landing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div id="header">
	<a href="projector.php"><div class="headlink" id="projector"><div class="textheadlink">Projector View</div></div></a>
	<a href="laptop.php"><div class="headlink" id="laptop"><div class="textheadlink">Laptop View</div></div></a>
	<a href="links.php"><div class="headlink" id="links"><div class="textheadlink">Modify Links</div></div></a>
	<a href="students.php"><div class="headlink" id="students"><div class="textheadlink">Modify Students</div></div></a>
	<a href="classes.php"><div class="headlink" id="classes"><div class="textheadlink">Modify Classes</div></div></a>
</div>

<div id="dropdowns">
<form method="get" style="float: left;">
    <select name='period' onchange='if(this.value != 0) {this.form.submit();}'>
         <option value='Select'>Select Period</option>
         <option value='All'>All Periods</option>
    </select>
</form>
<form method="get" style="float: right;">
    <select name='semester' onchange='if(this.value != 0) {this.form.submit();}'>
         <option value='Select'>Select Semester</option>
         <option value='S2016'>Spring 2016</option>
    </select>
</form>
</div>

<div id="body">
	<h1>Results for: (period, simester)</h1>
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
	
	<table>
		<tr>
			<th colspan="5">Other Thing?</th>
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
