<?php
if(empty($notif_title)) $notif_title = "Untitled Notification";
if(empty($notif_description)) $notif_description = "No description provided";
if(empty($notif_url)) $notif_url = "";
if(empty($notif_user_id)) $notif_user_id = "";

$notif_date = @date("M d, Y");
$notif_time = @date("H:i a");

$notif_query = "INSERT notification(title, description, url, user_id, date, time) VALUES ('$notif_title', '$notif_description', '$notif_url', '$notif_user_id', '$notif_date', '$notif_time')";
$mysqli->query($notif_query) or die($mysqli->error());

$notif_title = "";
$notif_description = "";
$notif_url = "";
$notif_user_id = "";
$notif_date = "";
$notif_time = "";

?>