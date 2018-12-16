<?php

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

$date = date_create("2013-03-15");

$result = (password_hash("test", PASSWORD_DEFAULT));

echo "<script>alert(\"$result\")</script>";

?>
</body>
</html>