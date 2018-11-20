<?php

ob_start();
session_start();
$timezone = date_default_timezone_set("Africa/Lagos");

// error reporting and logging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// create a new database connection
try {
   $con = new mysqli("localhost", "root", "", "quote");
   $con->set_charset("utf8mb4");
} catch (Exception $e) {
   error_log($e->getMessage());
   die("connection to the database failed ");
}







?>
