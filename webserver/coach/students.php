<?php
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/connect_iron.php'; #Connect to db.
?>
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
	<?php include '/home/aj4057/require_select_iron.php';?>
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