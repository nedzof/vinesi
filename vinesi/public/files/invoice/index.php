<?php require_once('../../private/initialize.php'); ?>
<?php include('../shared/header.php'); ?>


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
        <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Controlling</strong></h2>
        <p class="text-center" style="color: #a2a8ae;">Monitoring the rent payments.</p>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Start Date</th>
                                <th>Paid Date</th>
                                <th>Creator</th>
                                <th>Client</th>
                                <th>Property</th>
                            </tr>
                            <tr class="header">
                                <?php

                                $result = $db->query(getExpenseTable());

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) { ?>
                            </tr>
                            <tr>
                                <td><?php echo $row['expenseID'] ?></td>
                                <td><?php echo $row['expenseType'] ?></td>
                                <td><?php echo $row['expenseAmount'] ?></td>
                                <td><?php echo $row['expenseStartDate'] ?></td>
                                <td><?php echo $row['expensePaidDate'] ?></td>
                                <td><a class="action"
                                       href="<?php echo url_for('files/showPDF.php?id=' . $row['expenseID']); ?>">View</a>
                                </td>
                                <td>
                                    <button></button>
                                </td>
                                <td>
                                    <button></button>
                                </td>
                            </tr>


                            </tr>
                            <?php }
                            }
                            db_disconnect($db);
                            ?>
                            </thead>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center" style="padding: 26px;"><button class="btn btn-primary" type="button" style="margin: 0px;margin-right: 35px;background-color: #17a2b8;"><i class="icon ion-android-add" style="color: #ffffff;"></i></button><button class="btn btn-primary" type="button" style="margin-right: 35px;background-color: #17a2b8;"><i class="icon ion-printer"></i></button>
        <button
            class="btn btn-primary" type="button" style="background-color: #17a2b8;"><i class="icon ion-ios-email"></i></button>
    </div>
    <?php include "../shared/footer.php" ?>

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
 * Time: 09:53
 */