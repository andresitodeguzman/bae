<?php
/*
Edit Account
*/

// Start Sessin
session_start();

// Check if unathorized access
if(@empty($_SESSION['signed_in'])) die("Unauthorized Access");

// Include DB File
include("../_system/connection.php");

// Include Password Compat Library
include("../_lib/password.php");

// Handle POST Data
$name = strip_tags($_POST['name']);
$username = strip_tags($_POST['username']);
$old_password = strip_tags($_POST['old_password']);
$new_password = strip_tags($_POST['new_password']);

// Check for empty inputs
if(empty($name)) die("Name is Required");
if(empty($username)) die("Username is Required");
if(empty($old_password)) die("Current Password is Required");
if(empty($new_password)) die("New Password is Required");

$user_id = $_SESSION['user_id'];

// Prepare Query
$query = "SELECT * FROM account WHERE user_id='$user_id' LIMIT 1";

// Query
$result = $mysqli->query($query) or die($mysqli->error());

// Get Result
$account_check = mysqli_fetch_array($result);

// Check if empty result
if(empty($account_check)) die("Error Locating Account");

// Handle Password
$db_password = $account_check['password'];

// Verify Password
if(password_verify($old_password,$db_password)){

	// Hash Password
	$password = password_hash("$new_password",PASSWORD_DEFAULT);

	// Prepare Query
	$query = "UPDATE account SET name='$name', username='$username', password='$password' WHERE user_id='$user_id'";

	// Execute Query
	$mysqli->query($query) or die($mysqli->error());

	// Prepare Notif
	$notif_title = "You Made Changes in Your Account!";
	$notif_description = "Your sign-in information has been modified successfully!";

	// Send Notif
	include("_action/notification.php");

	echo "Ok";

}
?>