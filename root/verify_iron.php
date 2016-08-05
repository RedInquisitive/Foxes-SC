<?php
session_start();
if(!isset($_SESSION['login_user']) || !isset($_SESSION['timestamp']) || !isset($_SESSION['valid'])) { 
	logout();
	die();
}

if(strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['timestamp']) > 60*60 ){
	logout();
	die();
}

if($skip === null) {
	if($_SESSION['valid'] !== "Coach" && !isset($STUDENT_PAGE)) {
		logout();
		die();
	}
	if($_SESSION['valid'] !== "Student" && isset($STUDENT_PAGE)) {
		logout();
		die();
	}
}

function logout() {
	if(isset($_SESSION['valid'])) { 
		$_SESSION['valid'] = "false"; //Makes sure the session is killed.
	}
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: /index.php"); // Redirecting To Home Page
	}
	header("Location: /index.php");
}
?>