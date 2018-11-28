<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>


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

<div class="intro">
    <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Lease Menu</strong></h2>
    <p class="text-center" style="color: #a2a8ae;">In this tab all current units as well as their tenants are visible.</p>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr class="header">
                            <?php
                            $result = getLeaseTable();
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                        </tr>
                        <tr>
                            <td><?php echo $row['leaseID'] ?></td>
                            <td><?php echo $row['leaseMonthlyRent'] ?></td>
                            <td><?php echo $row['leaseUtilities'] ?></td>
                            <td><?php echo $row['leasePaymentMethod'] ?></td>
                            <td><?php echo $row['leaseDeposit'] ?></td>
                            <td><?php echo $row['leaseStart'] ?></td>
                            <td><?php echo $row['leaseEnd'] ?></td>
                            <td><?php echo $row['propertytable_propertyID'] ?></td>
                            <td><?php echo $row['tenanttable_tenantID'] ?></td>
                            <td><a class="action" href="<?php echo url_for('../public/files/lease/edit.php?id=' . $row['leaseID']); ?>">Edit</a></td>
                            <td> <button></button></td>
                        </tr>
                        <?php
                        }
                        mysqli_free_result($result);
                        db_disconnect($db);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>

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
 * Time: 09:50
 */