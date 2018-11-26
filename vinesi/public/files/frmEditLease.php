<?php require_once("../../private/initialize.php"); ?>
<?php include ('../shared/header.php'); ?>


<?php
 if(!isset($_GET['id'])){
     redirect_to(url_for('files/home.php'));
 }
 $id = $_GET['id'];

 if(is_post_request()){

     $leaseID = $_POST['leaseID'] ?? 0;
     $leaseMonthlyRent = $_POST['leaseMonthlyRent'] ?? "";
     $leaseUtilities = $_POST['leaseUtilities'] ?? "";
     $leasePaymentMethod = $_POST['leasePaymentMethod'] ?? "";
     $leaseDeposit = $_POST['leaseDeposit'] ?? "";
     $leaseStart = $_POST['leaseStart'] ?? "";
     $leaseEnd = $_POST['leaseEnd'] ?? "";
     $propertytable_propertyID = $_POST['propertytable_propertyID'] ?? "";
     $tentanttable_tenantID = $_POST['tentanttable_tenantID'] ?? "";





 }
?>


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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Team-Clean.css">
</head>

<body>
</body>


<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Edit</strong>&nbsp;Tenancy</h2>
            <form action="<?php echo url_for('files/frmEditLease.php') ?>">

                <div class="form-grou§p"><label class="text-secondary">Monthly Rent</label><input value="<?php echo $leaseMonthlyRent ?>"
                                                                                                  class="form-control"
                                                                                                  type="text"
                                                                                                  required=""
                                                                                                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$"
                                                                                                  inputmode="email">
                </div>
                <div class="form-group"><label class="text-secondary">Utilities</label><input class="form-control"
                                                                                              type="number" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Payment Method</label><input class="form-control"
                                                                                                   type="text"
                                                                                                   required=""></div>
                <div class="form-group"><label class="text-secondary">Deposit</label><input class="form-control"
                                                                                            type="text" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Start</label><input class="form-control"
                                                                                                type="date" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Expiry</label><input class="form-control"
                                                                                                 type="date"
                                                                                                 required=""></div>
                <div class="form-group"><label class="text-secondary">Property</label><input class="form-control"
                                                                                             type="number" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Tenant</label><input class="form-control"
                                                                                           type="number" required="">
                </div>
                <button class="btn btn-info mt-2" type="submit" style="max-height: -8px;"><i
                            class="icon ion-ios-compose-outline"></i></button>
            </form>


        </div>
    </div>
</div>
<?php include('../shared/footer.php'); ?>

</body>

</html>