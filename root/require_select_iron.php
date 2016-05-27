<?php
session_start(); #Starting Session
if(!isset($_SESSION["SEMESTER_GLOBAL"])) {
	$stmt = $conn->prepare("SELECT SEMESTER FROM CLASS ORDER BY DESC");
	$stmt->execute();
	$row = $stmt->fetch();
	$_SESSION["SEMESTER_GLOBAL"] = $row["SEMESTER"];
}

if(isset($_POST["SEMESTER_GLOBAL"])) {
	$_SESSION["SEMESTER_GLOBAL"] = $_POST["SEMESTER_GLOBAL"];
}
if(isset($_POST["PERIOD_GLOBAL"])) {
	$_SESSION["PERIOD_GLOBAL"] = $_POST["PERIOD_GLOBAL"];
}
if(!isset($_SESSION["SEMESTER"]) || !isset($_SESSION["PERIOD"]) || $_SESSION["SEMESTER"] === "NOTHING" || $_SESSION["PERIOD"] === "NOTHING") {?>
	<div id="dropdowns" style="margin: 0;">
		<form method="post" style="float: left;">
			<select name='SEMESTER_GLOBAL' onchange='if(this.value != 0) {this.form.submit();}'>
				 <option value='Select'>Select Semester</option>
				 <option value='S2016'>Spring 2016</option>
			</select>
		</form>
		<form method="post" style="float: right;">
			<select name='PERIOD_GLOBAL' onchange='if(this.value != 0) {this.form.submit();}'>
				 <option value='Select'>Select Period</option>
				 <option value='All'>All Periods</option>
			</select>
		</form>
	</div>
</div>
<div id="body">
	<h1>Wait!</h1>
	<br>
	<span>You must select a semester and a period from the top of this page in order to view its contents. If you have no periods or semesters yet, try creating some in the 'Modify Classes' tab.</span>
	<br>
</div>
</body>
</html>
<?php
	die();
}?>