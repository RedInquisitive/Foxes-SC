<?php
if(!isset($_SESSION['login_user']) || !isset($_SESSION['timestamp']) || !isset($_SESSION['valid'])) { 
	header("location: logout.php");
	die();
}

if(strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['timestamp']) > 60*60 ){
	$_SESSION['valid'] = "false"; //Makes sure the session is killed.
	header("location: logout.php");
	die();
}

if($_SESSION['valid'] !== "Coach") {
	header("location: logout.php");
	die();
}
?>