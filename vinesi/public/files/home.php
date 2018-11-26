<?php require_once("../../private/initialize.php"); ?>
<?php include ('../shared/header.php'); ?>


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

<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Home</h2>
            <p class="text-center">Vinesi's web-application.&nbsp;</p>
        </div>
        <div class="row projects">
            <div class="col-sm-6 item">
                <div class="row">
                    <div class="col-md-12 col-lg-5"><a href="<?php echo url_for('files/leases.php'); ?>">
                            <img class="img-fluid" src="../assets/img/Fotolia_122593238_Subscription_Monthly_M.jpg"></a></div>
                    <div class="col">
                        <h3 class="name">Tenancy Schedule</h3>
                        <p class="description">Overview of the current tenancies. The page includes information about the property units and the tenant and the individual contract.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 item">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <a href="<?php echo url_for('files/computation_panel.php'); ?>">
                            <img class="img-fluid" src="../assets/img/desk.jpg"></a></div>
                    <div class="col">
                        <h3 class="name">Computation</h3>
                        <p class="description">Creates a yearly invoice for clients for additional charges.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 item">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <a href="<?php echo url_for('files/controlling.php'); ?>">
                            <img class="img-fluid" src="../assets/img/building.jpg"></a></div>
                    <div class="col">
                        <h3 class="name">Controlling</h3>
                        <p class="description">Monitoring the rent payments.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 item" class>
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <a href="<?php echo url_for('files/expenses_tbl.php'); ?>">
                            <img class="img-fluid" src="../assets/img/Accounting-1024x682.jpg"></a>
                    </div>
                    <div class="col">
                        <h3 class="name">Expenses</h3>
                        <p class="description">Offers records of all incoming invoices of our suppliers.&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../shared/footer.php'); ?>

</body>

</html>