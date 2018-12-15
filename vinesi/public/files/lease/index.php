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
                            <th>ID</th>
                            <th>Monthly Rent</th>
                            <th>Utilities</th>
                            <th>Payment Method</th>
                            <th>Deposit</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Property ID</th>
                            <th>Tenant ID</th>
                            <th>Tenant Name</th>

                            <?php
                            $result1 = getLeaseTable();
                            for ($i = 0; $i < count($result1); $i++){
                                $row = $result1[$i];
                            ?>
                        </tr>
                        <tr>
                            <td><?php echo $row['leaseid'] ?></td>
                            <td><?php echo $row['leasemonthlyrent'] ?></td>
                            <td><?php echo $row['leaseutilities'] ?></td>
                            <td><?php echo $row['leasepaymentmethod'] ?></td>
                            <td><?php echo $row['leasedeposit'] ?></td>
                            <td><?php echo $row['leasestart'] ?></td>
                            <td><?php echo $row['leaseend'] ?></td>
                            <td><?php echo $row['propertytable_propertyid'] ?></td>
                            <td><?php echo $row['tenttable_tenantid'] ?></td>
                            <td><?php

                                $result2 = getTenantLastNameById($row['tenttable_tenantid']);
                                echo $result2['tenantlastname']; ?></td>


                            <td><a class="action"
                                   href="<?php echo url_for('../public/files/lease/lease_form.php?id=' . h(u($row['leaseid']))); ?>">Edit</a>
                            </td>
                            <td><a class="action"
                                   href="<?php echo url_for('../public/files/lease/lease_form.php?id=' . h(u($row['leaseid']))); ?>">Delete</a>
                            </td>                        </tr>
                        <?php } ?>

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