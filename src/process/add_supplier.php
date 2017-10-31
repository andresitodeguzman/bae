<?php
/*
Add Supplier
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Handle POST Data
$supplier_name = strip_tags($_POST['supplier_name']);
$supplier_description = strip_tags($_POST['supplier_description']);
$supplier_address = strip_tags($_POST['supplier_address']);
$supplier_contact = strip_tags($_POST['supplier_contact']);

// Check for empty name
if(empty($supplier_name)) die("Name cannot be empty");

// Prepare Query
$query = "INSERT supplier(supplier_name,supplier_description,supplier_address,supplier_contact) VALUES('$supplier_name','$supplier_description','$supplier_address','$supplier_contact')";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "Added $supplier_name successfully!";

?>