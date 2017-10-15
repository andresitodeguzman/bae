<?php
/*
Connection

This file creates a connection to the database
*/

// Define
$db_address = "localhost:3307";
$db_username = "root";
$db_password = "usbw";
$db_database = "bae-inventory";

// Connect to MySQL Server
mysql_connect($db_address, $db_username, $db_password);

// Select Database
mysql_select_db($db_database);

?>