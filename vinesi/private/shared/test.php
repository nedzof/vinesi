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

    $pdostatement = $db->prepare('SELECT * FROM usertable WHERE useremail = :email;');
    $pdostatement->bindValue(':email', "nedzo@fhnw.ch");
    $pdostatement->execute();
    echo $pdostatement->rowCount();
    echo "\n\n";
    if ($pdostatement->rowCount() > 0) {
        $result = $pdostatement->fetchObject();
        print_r($result);
    }
    return null;
}

?>
</body>
</html>