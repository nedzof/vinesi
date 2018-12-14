<?php use dao\TenantDAO;
use database\Database;

require_once('../database.php'); ?>
<?php require_once('../../private/initialize.php'); ?>


<!DOCTYPE html>
<html>
<head>
    <title>
        <meta charset="UTF-8">
        <title>Database Connection with PDO</title>
    </title>
</head>
<body>
<h1>Connection with PDO</h1>
<?php

$fruits = array("Apple", "Banana","Orange");
$fruits[0] = "Orange";
print_r($fruits);

$cars[0] = "bmw";
$cars[1] = "bmw";
print_r($cars);


?>
</body>
</html>