<?php require_once ('../database.php'); ?>



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

if (db_connection()){
    echo "<p>Successful</p>";

} else {
    echo "<p>Not successful</p>";
}

?>
</body>
</html>