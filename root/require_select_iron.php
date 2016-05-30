<?php
if (!isset ($_SESSION)) session_start();  #Starting Session
if(isset($_POST["SEMESTER_GLOBAL"]) && $_POST["SEMESTER_GLOBAL"] !== "NOTHING") {
	$_SESSION["SEMESTER_GLOBAL"] = $_POST["SEMESTER_GLOBAL"];
}
if(isset($_POST["PERIOD_GLOBAL"]) && $_POST["PERIOD_GLOBAL"] !== "NOTHING") {
	$_SESSION["PERIOD_GLOBAL"] = $_POST["PERIOD_GLOBAL"];
}
if(isset($_POST["WEEK_GLOBAL"])) {
	$_SESSION["WEEK_GLOBAL"] = $_POST["WEEK_GLOBAL"];
}

$semesterBuilder = array();
$periodBuilder = array();
$weekBuilder = array();

$weekNeeded = $weekNeeded; #Set this outside of this include to display the week changer.
$allAllowed = $allAllowed; #Set this outside of this include to show "all periods"

if($allAllowed === null || $allAllowed === FALSE) {
	if($_SESSION["PERIOD_GLOBAL"] === "ALL") {
		unset($_SESSION["PERIOD_GLOBAL"]);
	}
}

$stmt = $conn->prepare("SELECT DISTINCT SEMESTER FROM CLASS WHERE COACH = :coach");
$stmt->execute(array('coach' => $_SESSION['login_user']));
$all = $stmt->fetchAll();
foreach($all as $row) {
	$semesterBuilder[] = 
	'<option value="' . $row["SEMESTER"] .
	'" style="width: 100%;">' . $row["SEMESTER"] . '</option>';
}

for($week = 1; $week <= 12; $week++) {
	$weekBuilder[] = 
	'<option value="' . $week .
	'" style="width: 100%;">Week ' . $week . '</option>';
}


if(isset($_SESSION["SEMESTER_GLOBAL"])) {
	$stmt = $conn->prepare("SELECT PERIOD FROM CLASS WHERE SEMESTER = :semester AND COACH = :coach");
	$stmt->execute(array('semester' => $_SESSION["SEMESTER_GLOBAL"],
						 'coach' => $_SESSION['login_user']));
	$all = $stmt->fetchAll();
	if($allAllowed === TRUE) {
		$periodBuilder[] = '<option value="ALL" style="width: 100%;">ALL periods</option>';
	}
	foreach($all as $row) {
		$periodBuilder[] = 
		'<option value="' . $row["PERIOD"] .
		'" style="width: 100%;">' . $row["PERIOD"] . '</option>';
	}
}

if(isset($_SESSION["SEMESTER_GLOBAL"])) {
	$key = array_search('<option value="' .
	$_SESSION["SEMESTER_GLOBAL"] . '" style="width: 100%;">' .
	$_SESSION["SEMESTER_GLOBAL"] . '</option>', $semesterBuilder);
	
	if($key !== FALSE) {
		$semesterBuilder[$key] = 
		'<option selected="selected" value="' .
		$_SESSION["SEMESTER_GLOBAL"] . '" style="width: 100%;">' .
		$_SESSION["SEMESTER_GLOBAL"] . '</option>';
	}
}

if(isset($_SESSION["SEMESTER_GLOBAL"]) && isset($_SESSION["PERIOD_GLOBAL"])) {
	$key = array_search('<option value="' .
	$_SESSION["PERIOD_GLOBAL"] . '" style="width: 100%;">' .
	$_SESSION["PERIOD_GLOBAL"] . '</option>', $periodBuilder);
	
	if($key !== FALSE) {
		$periodBuilder[$key] = 
		'<option selected="selected" value="' .
		$_SESSION["PERIOD_GLOBAL"] . '" style="width: 100%;">' .
		$_SESSION["PERIOD_GLOBAL"] . '</option>';
	}
}

if(isset($_SESSION["WEEK_GLOBAL"])) {
	$key = array_search('<option value="' .
	$_SESSION["WEEK_GLOBAL"] . '" style="width: 100%;">Week ' .
	$_SESSION["WEEK_GLOBAL"] . '</option>', $weekBuilder);
	
	if($key !== FALSE) {
		$weekBuilder[$key] = 
		'<option selected="selected" value="' .
		$_SESSION["WEEK_GLOBAL"] . '" style="width: 100%;">Week ' .
		$_SESSION["WEEK_GLOBAL"] . '</option>';
	}
}
?> 
<div id="dropdowns" style="margin: 0;">
	<form method="post" style="float: left;">
		<select name='SEMESTER_GLOBAL' onchange='if(this.value != 0) {loading(); this.form.submit();}'>
<?php if(!isset($_SESSION["SEMESTER_GLOBAL"])) { ?>
			 <option value='NOTHING'>Select Semester</option>
			 <?php } foreach($semesterBuilder as $row) {echo($row);} ?>
		
		</select>
	</form>
	<form method="post" style="float: right;">
		<select name='PERIOD_GLOBAL' onchange='if(this.value != 0) {loading(); this.form.submit();}'>
<?php if(!isset($_SESSION["PERIOD_GLOBAL"])) { ?>
			 <option value='NOTHING'>Select Period</option>
			 <?php } foreach($periodBuilder as $row) {echo($row);} ?>
		
		</select>
	</form>
	<?php if($weekNeeded === TRUE) { ?>
	<form method="post" style="float: right;">
		<select name='WEEK_GLOBAL' onchange='if(this.value != 0) {loading(); this.form.submit();}'>
<?php if(!isset($_SESSION["WEEK_GLOBAL"])) { ?>
			 <option value='NOTHING'>Select Week</option>
			 <?php } foreach($weekBuilder as $row) {echo($row);} ?>
		
		</select>
	</form><?php } ?>
</div>
<?php
if(!isset($_SESSION["SEMESTER_GLOBAL"]) || !isset($_SESSION["PERIOD_GLOBAL"]) || (!isset($_SESSION["WEEK_GLOBAL"]) && $weekNeeded === TRUE)) {
?>
</div>
<div id="loading" style="width:100%; height:100%; position:fixed; top:0; left:0; background: rgba(0, 0, 0, 0.4); display:none">
	<image style="margin: auto; display:block; padding-top:100px; width:400px;" src="../images/loading.gif"/>
</div>
<div id="body">
	<h1>Wait!</h1>
	<br>
	<?php
	if(!isset($_SESSION["WEEK_GLOBAL"]) && $weekNeeded === TRUE) {
	?>
	<span>You must select a semester, a period, and a week from the top of this page in order to view its contents. If you have no periods or semesters yet, try creating some in the 'Modify Classes' tab. You can select any week 1-12.</span>
	<?php
	} else {
	?>
	<span>You must select a semester and a period from the top of this page in order to view its contents. If you have no periods or semesters yet, try creating some in the 'Modify Classes' tab.</span>
	<?php
	}
	?>
	<br>
</div>
</body>
</html>
<?php
	die();
}
?>