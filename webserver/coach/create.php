<?php
include '/home/aj4057/verify_iron.php';
include '/home/aj4057/config_iron.php'; #Connect to db.

do {
if(isset($_POST["BASE_BENCH"]) && isset($_POST["BASE_BACKSQUAT"]) && isset($_POST["BASE_DEADLIFT"])) {
	if(!is_numeric($_POST["BASE_BENCH"]) || !is_numeric($_POST["BASE_BACKSQUAT"]) || !is_numeric($_POST["BASE_DEADLIFT"])) {
		$editError = "You somehow submitted text that should be a number. Try again with a number!";
		break;
	}
	$stmt = $conn->prepare("INSERT INTO STUDENT$ (STUDENT_ID, NAME, PERIOD, SEMESTER, COACH, BASE_BENCH, BASE_BACKSQUAT, BASE_DEADLIFT) VALUES (:studentid, :name, :period, :semester, :coach, :bench, :backsquat, :deadlift)");
	$stmt->execute(array('studentid' => $_POST["STUDENT_ID"],
					 'name' => $_POST["NAME"],
					 'period' => $_SESSION["PERIOD_GLOBAL"],
					 'semester' => $_SESSION["SEMESTER_GLOBAL"],
					 'coach' => $_SESSION['login_user'],
					 'bench' => $_POST["BASE_BENCH"],
					 'backsquat' => $_POST["BASE_BACKSQUAT"],
					 'deadlift' => $_POST["BASE_DEADLIFT"]));
					 
	$editSuccess = 'You created the student "' . $_POST["NAME"] . '" in semester "' . $_SESSION["SEMESTER_GLOBAL"] . '" under the period "' . $_SESSION["PERIOD_GLOBAL"] . '" successfully!';
}
}while(0)
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
		<a href="students.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">Exit</div></div></a>
	</div>
	<?php include '/home/aj4057/require_select_iron.php';?>
</div>

<div class="pseudobody">
	<h1>Create</h1>
	<div class="center">
		<form method="post">
			<?php
			if($error !== "") {echo("<span>$error</span>");}
			if($editError !== "") {echo("<span>$editError</span>");}
			if($editSuccess !== "") {echo("<p style=\"color:green;\">$editSuccess</p>");}
			?>
			
			<h3 class="titlepadding">Name</h3>
				<input class="text" 		
					   type="text" 		
					   name="NAME" 
					   placeholder="ex: Bob Joe" autofocus><br>
			
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