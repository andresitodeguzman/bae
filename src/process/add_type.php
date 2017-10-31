<?php
/*
Add Type
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle POST Data
$name = strip_tags($_POST['name']);
$description = strip_tags($_POST['description']);

// Check for empty name
if(empty($name)) die("Name cannot be empty");

// Prepare Query
$query = "INSERT product_type(name,description) VALUES('$name','$description')";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "Added $name successfully!";
?>