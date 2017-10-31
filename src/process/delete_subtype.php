<?php
/*
Delete Subtype
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$product_subtype_id = $_REQUEST['id'];

// Prepare Query
$query = "DELETE FROM product_subtype WHERE product_subtype_id='$product_subtype_id'";

// Query
$mysqli->query($query)  or die($mysqli->error());

// Redirect
header("Location: " . $_SERVER['HTTP_REFERER']);

?>