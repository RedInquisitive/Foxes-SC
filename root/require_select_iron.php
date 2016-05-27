<?php
session_start(); #Starting Session
if(!isset($_SESSION["SEMESTER"] && !isset($_SESSION["PERIOD"])) {
	echo("<span>You must select a semester and a period from the top of this page in order to view its contents. If you have no periods or semesters yet, try creating some in the 'Modify Classes' tab.</span>");
	echo("</div></body>");
	die();
}
?>