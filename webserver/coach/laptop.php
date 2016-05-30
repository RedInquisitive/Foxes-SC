<?php
$weekNeeded = TRUE;
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
	<script>
	function loading() { 
		document.getElementById("loading").style.display="block";
	}
	</script>
</head>
<body>
<div id="navbar">
	<div id="exit" style="margin: 0;">
		<a href="index.php"><div class="headlink" style="border-radius: 0 0 30px 0;"><div class="textheadlink">No, take me back!</div></div></a>
	</div>
	<?php include '/home/aj4057/require_select_iron.php';?>
</div>
<div id="body">
	<h1>Are you sure?</h1>
	<div class="center" style="font-size: 22px; margin-bottom: 20px;">
		<p>To prevent students from tampering with data, entering this mode will require you to enter your username and password if you want to edit students, links, or classes again.</p>
		<p>Students from the period and semester that you select above will still be able to enter their information.</p>
		<p>The week you select is simply a suggestion, students will be able to enter information from the weeks prior.</p> 
		<div style="margin: 20px; height: 100px;">
			<a href="laptopdata.php"><div class="headlink" style="background-color:#DD0000;	color:#fff;	border:2px solid #FF0000; padding:10px;	font-size:20px; cursor:pointer; border-radius:5px;"><div class="textheadlink">Use <?php echo($_SESSION["SEMESTER_GLOBAL"] . ', ' . $_SESSION["PERIOD_GLOBAL"]); ?></div></div></a>
		</div>
	</div>
</div>
<div id="loading" style="width:100%; height:100%; position:fixed; top:0; left:0; background: rgba(0, 0, 0, 0.4); display:none">
	<img style="margin: auto; display:block; padding-top:100px; width:400px;" src="../images/loading.gif"/>
</div>
<script> 
var forms = document.getElementsByTagName('form');
for(i=0;i<forms.length;i++) {
	forms[i].addEventListener("submit", loading, false);
}
</script>
</body>