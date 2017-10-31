<?php
/*
404
*/

// Start Session
session_start();

// Include Config File
include("_system/config.php");

// Activity Title
$activity_title = "Page Not Found";

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title." - ".$site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body>
		<?php include("_contents/navbar.php"); ?>
		<div class="container">
			<br><br>
			<h3><b>Page Not Found</b></h3><br>
			<p>The page you were looking for was not found in our server.</p>
		</div>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

