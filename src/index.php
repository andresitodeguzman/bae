<?php
/*
Index
*/

// Start Session
session_start();

// Include Config File
include("_system/config.php");

// Activity Title
$activity_title = "Home";

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body bgcolor="lightblue">
		<?php include("_contents/navbar.php"); ?>
		<?php include("_contents/home.php"); ?>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

