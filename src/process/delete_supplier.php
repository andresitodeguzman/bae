<?php
/*
Delete Supplier
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$supplier_id = strip_tags($_REQUEST['id']);

// Prepare Query
$query = "DELETE FROM supplier WHERE supplier_id='$supplier_id'";

// Query
$mysqli->query($query)  or die($mysqli->error());

// Redirect
header("Location: " . $_SERVER['HTTP_REFERER']);

?>