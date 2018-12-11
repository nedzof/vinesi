<?php require_once ('../database.php'); ?>
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
global $db;
if ($db == true) {
    echo "<p>Successful</p>";

    //insertUserTable('Fetahovic','nedzo.fetahovic@students.fhnw.ch','test','false');
   // $db->exec($sql);

    /* $pdostatement = $db->prepare('SELECT * FROM usertable WHERE useremail = :email');
     $pdostatement->bindValue(':email', "nedzo@fhnw.ch");
     $pdostatement->execute();
     if ($pdostatement->rowCount() > 0) {
         return $result = $pdostatement->fetchObject();
     }
     return null;*/

    echo(password_hash("test", PASSWORD_DEFAULT));
}

?>
</body>
</html>