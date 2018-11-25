<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="../assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="../assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Team-Clean.css">
</head>

<body>
<?php include_once ('../shared/header.php'); ?>

<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Create</strong>&nbsp;Tenancy</h2>
            <form>
                <div class="form-grou§p"><label class="text-secondary">Monthly Rent</label><input class="form-control" type="number" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                <div class="form-group"><label class="text-secondary">Utilities</label><input class="form-control" type="number" required=""></div>
                <div class="form-group"><label class="text-secondary">Payment Method</label><input class="form-control" type="number" required=""></div>
                <div class="form-group"><label class="text-secondary">Deposit</label><input class="form-control" type="number" required=""></div><button class="btn btn-info mt-2" type="submit" style="max-height: -8px;"><i class="icon ion-ios-compose-outline"></i></button></form>
            <div class="form-group"><label class="text-secondary">Lease Start</label><input class="form-control" type="date" required=""></div>
            <div class="form-group"><label class="text-secondary">Lease Expiry</label><input class="form-control" type="date" required=""></div>
            <div class="form-group"><label class="text-secondary">Property</label><input class="form-control" type="number" required=""></div>
            <div class="form-group"><label class="text-secondary">Tenant</label><input class="form-control" type="number" required=""></div> </div>
    </div>
</div>
<?php include_once ('../shared/footer.php'); ?>

</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 06.11.2018
 * Time: 09:51
 */