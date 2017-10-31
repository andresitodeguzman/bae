<?php
/*
Add Product
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access"); 

// Include DB File
include("../_system/connection.php");

// Get POST Data
$product_code = strip_tags($_POST['product_code']);
$name = strip_tags($_POST['name']);
$description = strip_tags($_POST['description']);
$product_subtype_id = strip_tags($_POST['product_subtype_id']);
$price = strip_tags($_POST['price']);
$available_stocks = strip_tags($_POST['available_stocks']);

// Check for empty Product Code
if(empty($product_code)) die("Product Code is Required");

// Check  if price is empty or NaN
if(!is_numeric($price) XOR empty($price)) die("Invalid Price");

// Set available stock to 0 if NaN or Empty
if(!is_numeric($available_stocks) XOR empty($available_stocks)) $available_stocks = "0";

// Prepare Query
$query = "INSERT product(product_code, name, description, product_subtype_id, price, available_stocks) VALUES ('$product_code', '$name', '$description', '$product_subtype_id', '$price', '$available_stocks')";

// Query
$mysqli->query($query) or die($mysqli->error());

// Echo Response
echo "Added $name successfully!";

?>