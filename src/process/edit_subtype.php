<?php
/*
Edit Subtype
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$product_subtype_id = strip_tags($_REQUEST['id']);
$name = strip_tags($_POST['name']);
$description = strip_tags(($_POST['description']);
$product_type_id = strip_tags($_POST['product_type_id']);

// Check if empty subtype ID
if(empty($product_subtype_id)) die("Subtype is Required");

//  Check if empty name
if(empty($name)) die("Name is Required");

// Check if empty type
if(empty($product_type_id)) die("Type is Required");

// Prepare Query
$query = "UPDATE product_subtype SET name='$name',description='$description',product_type_id='$product_type_id' WHERE product_subtype_id='$product_subtype_id'";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "Edited $name successfully!";

?>