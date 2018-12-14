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

$tenantlist = [];

$pdoInstance = Database::connect();

$stmt = $pdoInstance->prepare('SELECT * FROM tenanttable ORDER BY tenantid');


$stmt->execute();


if ($stmt->rowCount() > 0) {


}
$result =  $stmt->fetchAll(PDO::FETCH_CLASS, Tenant::class);



for ($i = 0; $i < count($result); $i++) {
    $lastnametenant = $result[$i]['tenantlastname'];
    $firstname = $result[$i]['tenantfirstname'];
    $name = $lastnametenant . " " . $firstname;
    if ($result[$i]['leaseid'] == $id) {
        array_push($tenantlist, "<option selected value='$lastnametenant'>$name</option>");
    } else {
        array_push($tenantlist, "<option value='$lastnametenant'>$name</option>");
    }
}

foreach ($tenantlist as $tenant):
    echo $tenant;
endforeach;
?>
</body>
</html>