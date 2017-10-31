<?php
/*
Edit Product
*/
// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Get Data
$product_id = strip_tags($_REQUEST['id']);
$product_code = strip_tags($_POST['product_code']);
$name = strip_tags($_POST['name']);
$description = strip_tags($_POST['description']);
$product_subtype_id = strip_tags($_POST['product_subtype_id']);
$price = strip_tags($_POST['product_price']);
$available_stocks = strip_tags($_POST['available_stocks']);

// Check for empty Product Code
if(empty($product_code)) die("Product Code is Required");

// Check  if price is empty or NaN
if(!is_numeric($price) XOR empty($price)) die("Invalid Price");

// Set available stock to 0 if NaN or Empty
if(!is_numeric($available_stocks) XOR empty($available_stocks)) $available_stocks = "0";

// Prepare Query
$query = "UPDATE product SET product_code='$product_code', name='$name', description='$description', product_subtype_id='$product_subtype_id', price='$price', available_stocks='$available_stocks' WHERE product_id='$product_id'";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "$name edited successfully!"; 

?>