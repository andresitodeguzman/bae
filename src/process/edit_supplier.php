<?php
/*
Edit Supplier
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle Data
$supplier_id = strip_tags($_REQUEST['id']);
$supplier_name = strip_tags($_POST['supplier_name']);
$supplier_description = strip_tags($_POST['supplier_description']);
$supplier_address = strip_tags($_POST['supplier_address']);
$supplier_contact = strip_tags($_POST['supplier_contact']);

// Check for empty name
if(empty($supplier_name)) die("Name cannot be empty");

// Prepare Query
$query = "UPDATE supplier SET supplier_name='$supplier_name', supplier_description='$supplier_description', supplier_address='$supplier_address', supplier_contact='$supplier_contact' WHERE supplier_id='$supplier_id'"; 

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "$supplier_name Edited Successfully!";

?>