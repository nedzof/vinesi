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
if ($db == true) {
    echo "<p>Successful</p>";

    insertUserTable('Fetahovic','nedzo.fetahovic@students.fhnw.ch','test','false');
   // $db->exec($sql);
}

?>
</body>
</html>