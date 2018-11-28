<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php





?>


    <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../../assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="../../assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="../../assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="../../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../../assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="../../assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/Team-Clean.css">
</head>

<body>

<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Create</strong>&nbsp;Invoice</h2>
            <form action="<?php echo url_for('create.php')?>" method="post">
                <div class="form-group"><label class="text-secondary">ID</label><input class="form-control" type="number" required=""></div>
                <div class="form-group"><label class="text-secondary">Type</label><input class="form-control" type="text" required=""></div>
                <div class="form-group"><label class="text-secondary">Amount</label><input class="form-control" type="number" required=""></div>
                <div class="form-group"><label class="text-secondary">Date start</label><input class="form-control" type="date" required=""></div>
                <div class="form-group"><label class="text-secondary">Date paid</label><input class="form-control" type="date" required=""></div>
                <div class="form-group"><label class="text-secondary">Invoice Creator</label><input class="form-control" type="number" required=""></div>
                <div class="form-group"><label class="text-secondary">Invoice Client</label><input class="form-control" type="number" required=""></div>

                </div><button class="btn btn-info mt-2" type="submit">Save</button></form>
        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/header.php'); ?>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>

<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 06.11.2018
 * Time: 09:51
 */

