<?php 
/*
Account
Sign-Out
*/

// Start Session
session_start();

// Destroy Session
session_destroy();

// Redirect
header("Location: /account");

?>