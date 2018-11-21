<?php include('../files/dbh.php'); ?>


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
    <?php include_once('../shared/header.php'); ?>

    <div class="intro">
        <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Expenses</strong></h2>
        <p class="text-center" style="color: #a2a8ae;">Overview of all expenses during a weeks time.</p>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="striped">
                            <tr class="header">
                                <?php

                                $sql = "SELECT * FROM expensetable";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['expenseID'] . "</td>";
                                        echo "<td>" . $row['expenseType'] . "</td>";
                                        echo "<td>" . $row['expenseAmount'] . "</td>";
                                        echo "<td>" . $row['expenseStartDate'] . "</td>";
                                        echo "<td>" . $row['expensePaidDate'] . "</td>";
                                        echo "<td> <a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . $row['expenseID']); ?>">View</a></td>
                                        echo "<td>  <button class=\"btn btn-primary\" type=\"button\" style=\"margin-right: 35px;background-color: #17a2b8;\"><i
                    class=\"icon ion-printer\"></i></button></td>";
                                        echo "<td>       <button
                class=\"btn btn-primary\" type=\"button\" style=\"background-color: #17a2b8;\"><i
                    class=\"icon ion-ios-email\"></i></button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();

                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center"
         style="padding: 26px;">
        <button class="btn btn-primary" type="button" style="margin: 0px;margin-right: 35px;background-color: #17a2b8;">
            <i class="icon ion-android-add" style="color: #ffffff;"></i></button>


    </div>
    <?php include "../shared/footer.php" ?>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    </body>

    </html>
