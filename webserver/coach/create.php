<?php
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/connect_iron.php'; #Connect to db.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Creation</title>
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
		<select name='SEMESTER' onchange='if(this.value != 0) {this.form.submit();}'>
			 <option value='Select'>Select Semester</option>
		</select>
	</form>
	<form method="post" style="float: right;">
		<select name='PERIOD' onchange='if(this.value != 0) {this.form.submit();}'>
			 <option value='Select'>Select Period</option>
		</select>
	</form>
</div>

<div class="pseudobody">
	<h1>Create</h1>
	<div class="center">
		<form method="post">
			<p style="color:green">Student "Aaron Walter" created successfully.</p>
			
			<h3 class="titlepadding">Name</h3>
				<input class="text" 		
					   type="text" 		
					   name="NAME" 
					   placeholder="ex: Bob Joe"><br>
			
			<h3 class="titlepadding">Student ID</h3>
				<input class="text"
					   type="text"
					   name="STUDENT_ID"
					   placeholder="ex: 1714057"><br>
					   
			<h3 class="titlepadding">Original Dead Lift MAX</h3>
				<input class="text"
					   type="number"
					   name="BASE_BENCH"
					   placeholder="ex: 100"><br>
					   
			<h3 class="titlepadding">Original Bench MAX</h3>
				<input class="text"
					   type="number"
					   name="BASE_DEADLIFT"
					   placeholder="ex: 100"><br>
					   
			<h3 class="titlepadding">Original Squat MAX</h3>
				<input class="text"
					   type="number"
					   name="BASE_BACKSQUAT"
					   placeholder="ex: 100"><br>

			<div class="padding"><input type="submit"	value="Create Student!" class="goodbutton"></div>
		</form><br>
	</div>
</div>
</body>