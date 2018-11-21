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

$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["userID"]. " - Name: " . $row["userLastName"]. " " . $row["userEmail"]. " ". $row["userPassword"]. " " . $row["userStatus"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>