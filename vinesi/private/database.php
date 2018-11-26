<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 13.11.2018
 * Time: 17:42
 */

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "vinesidatabase";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}

function confirm_db_connect() {
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

?>