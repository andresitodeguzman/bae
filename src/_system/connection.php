<?php
/*
Connection
*/

// Define
$sql_host = "localhost:3307";
$sql_username = "root";
$sql_password = "usbw";
$sql_database = "bae2";

/*
$sql_host = "sql205.byethost6.com";
$sql_username = "b6_17631636";
$sql_password = "";
$sql_database = "b6_17631636_bae";
*/

// Create Connection Object
$mysqli = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);

?>