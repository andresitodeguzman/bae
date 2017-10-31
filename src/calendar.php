<?php
/*
Index
*/

// Start Session
session_start();

// Include Config File
include("_system/config.php");

// Activity Title
$activity_title = "Calendar";

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title." - ".$site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body>
		<?php include("_contents/navbar.php"); ?>
		<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;height=500&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=fnlv7nr0lp27l04m7nk9fht4q0%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Asia%2FManila" style="border-width:0" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

