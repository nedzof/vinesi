<?php require_once ('../database.php'); ?>
<?php require_once('../../private/initialize.php'); ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Connection with PDO</title>
    </title>
</head>
<body>
<h1>Connection with PDO</h1>
<?php
global $db;
if (db_connection() != false){
    echo "<p>Successful</p>";

    $sql = "INSERT INTO usertable " ;
    $sql .= "(userlastname, useremail, userhashedpassword, userstatus) ";
    $sql .= "VALUES (";
    $sql .= "'" . "Villar" . "', ";
    $sql .= "'" . "victoria.villar@students.fhnw.ch" . "', ";
    $sql .= "'" . "test123" . "' ,";
    $sql .= "'" . "true" . "',";
    $sql .= ")";


    $db->exec($sql);
    echo "<p>Query Submitted</p>";

} else {
    echo "<p>Not successful</p>";
}

?>
</body>
</html>