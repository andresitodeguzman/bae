<?php

session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

if(@empty($_REQUEST['notification_id'])) die("notification_id is required");

$notification_id = $_REQUEST['notification_id'];

$sql_query = "DELETE FROM notification WHERE notification_id='$notification_id'";
$mysqli->query($sql_query) or die($mysqli->error());

echo "Notification deleted successfully!";
?>