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
	<title>Edit Students</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="navbar">
	<div id="exit" style="margin: 0;">
		<a href="index.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">Exit</div></div></a>
	</div>
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
<div id="body">
	<h1>Edit Students</h1>
	<form method="post">
		<table>
			<style>
				button{margin-top:0}
			</style>
			<tr>
				<th>Name</th>
				<th>Period</th>
				<th>Student ID</th>
				<th colspan="3">Actions</th>
			</tr><tr>
				<td colspan="6">
					<a href="create.php"><div class="headlink" style="height: 52px;"><div class="textheadlink">Add Student</div></div></a>
				</td>
			</tr><tr>
				<td>Bob</td>
				<td>Period 1</td>
				<td>1111111</td>
				<td><button name="edit" type="submit" value="1111111">Edit</button></td>
				<td><button name="move" type="submit" value="1111111">Move</button></td>
				<td><button name="delete" type="submit" value="1111111">Delete</button></td>
			</tr>
		</table>
	</form>
</div>
</body>