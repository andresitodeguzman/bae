<?php
/*
Add SubType
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
$product_type_id = strip_tags($_POST['product_type_id']);

//  Check if empty name
if(empty($name)) die("Name is Required");

// Check if empty type
if(empty($product_type_id)) die("Type is Required");

// Prepare Query
$query = "INSERT product_subtype(name,description,product_type_id) VALUES ('$name','$description','$product_type_id')";

// Query
$mysqli->query($query) OR die($mysqli->error());

// Echo Response
echo "Added $name successfully!";

?>