<?php
/*
Account
Sign-In
*/

// Start Session
session_start();

// Include DB File
include("../_system/connection.php");

// Include Password Compat Library
include("../_lib/password.php");

// Handle POST Data
$username_entry = strip_tags($_POST['username']);
$password_entry = strip_tags($_POST['password']);

// Prepare Query
$query = "SELECT user_id, username, password, name FROM account WHERE username='$username_entry' LIMIT 1";

// Query
$result = $mysqli->query($query) or die($mysqli->error());

// Get Result
$account = mysqli_fetch_array($result);

// Check if empty result
if(empty($account)) die("The Username or Password is Incorrect");

// Handle Query Data
$user_id = $account['user_id'];
$username = $account['username'];
$password = $account['password'];
$name = $account['name'];

// Verify Password
if(password_verify($password_entry,$password)){

	// Set Session Vars	
	$_SESSION['signed_in'] = True;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['username'] = $username;
	$_SESSION['name'] = $name;

	// Return Ok
	echo "Ok";

} else {

	// Inform wrong sign-in detail
	die("The Username or Password is Incorrect");

}

?>