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

    $sql = "INSERT INTO public.usertable (userid, userlastname, useremail, userhashedpassword, userstatus) VALUES (DEFAULT, 'Sira', 'sira.tamba@fhnw.students.ch', 'test', NULL)";



    $affected = $db->exec($sql);
    echo $affected . ' row inserted with ID ' . $db->lastInsertId();
}

?>
</body>
</html>