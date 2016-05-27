<?php
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/config_iron.php'; #Connect to db.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Are you sure?</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="navbar">
	<div id="exit" style="margin: 0;">
		<a href="index.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">No, take me back!</div></div></a>
	</div>
</div>
<div id="body">
	<h1>Are you sure?</h1>
	<div class="center" style="font-size: 22px; margin-bottom: 20px;">
		<p>To prevent students from tampering with data, entering this mode will require you to enter your username and password if you want to edit students, links, or classes again.</p>
		<p>Students from the period and semester that you select below will still be able to enter their information.</p>
			<form method="post" action="laptopdata.php">
			<select name='semester'>
				 <option value='S2016'>Spring 2016</option>
			</select>
			<select name='period'>
				 <option value='All'>All Periods</option>
			</select>
			<div class="padding"><input type="submit" value="Ok"></div>
		</form>
	</div>
</div>
</body>