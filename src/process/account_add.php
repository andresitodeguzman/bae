<?php
/*
Add Account
*/

// Include DB File
include("../_system/connection.php");

// Include Password Compat Library
include("../_lib/password.php");

// Set Access Code
$ac = "bae_screw";

// Handle POST Data
$access_code = strip_tags($_POST['access_code']);
$name = strip_tags($_POST['name']);
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

// Check empty values
if(empty($access_code)) die("Error Code is Required");
if(empty($name)) die("Name is Required");
if(empty($username)) die("Username is Required");
if(empty($password)) die("Password is Required");
if(strlen($password) < 8) die("Password too short");

// Prepare Query
$query = "SELECT user_id, username, password, name FROM account WHERE username='$username' LIMIT 1";

// Query
$result = $mysqli->query($query) or die($mysqli->error());

// Get Result
$account_check = mysqli_fetch_array($result);

// Check if username exists
if(!empty($account_check)) die("Username already registered");

// Check if Access Code is correct
if($access_code == $ac){

	// Hash Password
	$password = password_hash("$password",PASSWORD_DEFAULT);

	// Prepare Query
	$query = "INSERT account(name,username,password) VALUES('$name','$username','$password')";

	// Query
	$mysqli->query($query) or die($mysqli->error());

	// Echo Response
	echo "$name($username) added successfully!";

}

?>