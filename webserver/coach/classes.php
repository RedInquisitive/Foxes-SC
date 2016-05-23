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
	<title>Edit Classes</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="navbar">
	<div id="exit" style="margin: 0;">
		<a href="index.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">Exit</div></div></a>
	</div>
</div>

<div class="pseudobody">
	<h1>Create</h1>
	<div class="center">
		<form method="post">
			<h3 class="titlepadding">Create new semester with the name...</h3>
				<input class="text" 		
					   type="text" 		
					   name="createsemestername" 
					   placeholder="ex: Spring 2016"><br>
			
			<h3 class="titlepadding">...OR select an existing semester from this drop-down list...</h3>
				<select name='createsemesterselect' class="classestext">
					 <option value='nothing' style="width: 100%;">Click to select an existing semester</option>
				</select><br><br><br>
			
			<h3 class="titlepadding">...and then add the period to it...</h3>
				<input class="text"
					   type="text"
					   name="createperiodname"
					   placeholder="ex: Period 1"><br>

			<div class="padding"><input type="submit"	value="Create Period!" class="goodbutton"></div>
		</form><br>
	</div>
</div>

<div class="pseudobody">
	<h1>Destroy</h1>
	<div class="center">
		<form method="post">
			<h3 class="titlepadding">Destroy semester</h3>
				<select name='destroysemester' class="classestext">
					 <option value='nothing' style="width: 100%;">Select semester</option>
				</select>
			
			<div class="padding"><input type="submit"	value="Delete semester forever!"></div>
		</form>
	</div>
	
	<br><br><br>
	
	<div class="center">
		<form method="post">
			<h3 class="titlepadding">Destroy period from semester...</h3>
				<select name='destroyperiodsemester' class="classestext">
					 <option value='nothing' style="width: 100%;">Select semester</option>
				</select>
			
			<div class="padding"><input type="submit"	value="Procede to next step..."></div>
		</form><br>
	</div>
</div>
</body>