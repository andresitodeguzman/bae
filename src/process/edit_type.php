<?php
/*
Edit Type
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$product_type_id = strip_tags($_REQUEST['id']);
$name = strip_tags($_POST['name']);
$description = strip_tags($_POST['description']);

// Check for empty name
if(empty($name)) die("Name cannot be empty");

// Prepare Query
$query = "UPDATE product_type SET name='$name', description='$description' WHERE product_type_id='$product_type_id'";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "Edited $name successfully!";
?>