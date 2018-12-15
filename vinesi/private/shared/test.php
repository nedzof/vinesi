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

$d = new Datetime('2000-01-01');
//$d = date('Y-m-d');

$result = $d->format('Y-m-d H:i:s.u');
echo "<script>alert(\"$result\")</script>";

?>
</body>
</html>