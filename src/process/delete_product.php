<?php
/*
Delete Product
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$product_id = strip_tags($_REQUEST['id']);

// Prepare Query
$query = "DELETE FROM product WHERE product_id='$product_id'";

// Query
$mysqli->query($query) or die($mysqli->error());

// Redirect
header("Location: " . $_SERVER['HTTP_REFERER']);

?>