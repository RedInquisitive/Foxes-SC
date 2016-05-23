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
	<title>Links</title>
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
	<h1>Current Links</h1>
	<form method="post">
		<table>
			<tr>
				<th>Link</th>
				<th>Description</th>
				<th>Status</th>
				<th>Select</th>
			</tr><tr>
				<td><a href="example.com">example.com</a></td>
				<td>example</td>
				<td style="background-color:#C00; color: white;">disabled</td>
				<td><label><input type="checkbox" name="enabled" value="1">Select link</label></td>
			</tr>
		</table>
		<div class="center">
			<button name="edit" value="toggle" type="submit" class="goodbutton">Toggle Selected Links</button>
			<button name="edit" value="destroy" type="submit">Destroy Selected Links</button>
		</div>
	</form>
	<br>
</div>
<div class="pseudobody">
	<h1>Edit Links</h1>
	<div class="center">
		<form method="post">
			<h3 class="titlepadding">URL</h3>
				<input class="text" 		
					   type="text" 		
					   name="url" 
					   placeholder="ex: https://www.google.com/"><br>
			
			<h3 class="titlepadding">Description</h3>
				<input class="text"
					   type="text"
					   name="description"
					   placeholder="ex: Discover websites and information with Google"><br><br>
					   
			<label><input type="checkbox" name="enabled" value="true">Mark this link as enabled</label><br><br>
			<div class="padding"><input type="submit"	value="Create link!" class="goodbutton"></div>
		</form><br>
	</div>
</div>
</body>