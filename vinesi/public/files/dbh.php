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




?>