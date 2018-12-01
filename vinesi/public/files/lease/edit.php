<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php

//if (!isset($_GET['id']) || !isset($_GET['pID']) || !isset($_GET['tID'])) {
if (!isset($_GET['id'])) {

    redirect_to(url_for('/files/index.php'));
}
$entry = [];
$id = $_GET['id'];
$row = getLeaseTable_By_ID($id);


if (is_post_request()) {



    $entry['leaseID'] = $row['leaseID'] ?? 1;
    $entry['leaseMonthlyRent'] = $_POST['leaseMonthlyRent'] ?? '';
    $entry['leaseUtilities'] = $_POST['leaseUtilities'] ?? '';
    $entry['leasePaymentMethod'] = $_POST['leasePaymentMethod'] ?? '';
    $entry['leaseDeposit'] = $_POST['leaseDeposit'] ?? '';
    $entry['leaseStart'] = $_POST['leaseStart'] ?? '';
    $entry['leaseEnd'] = $_POST['leaseEnd'] ?? '';
    $entry['propertytable_propertyID'] = $_POST['propertytable_propertyID'] ?? 11;
    $entry['tenanttable_tenantID'] = $_POST['tenanttable_tenantID'] ?? 1;


    $pID = $entry['propertytable_propertyID'];
    $tID = $entry['tenanttable_tenantID'];


    $result = updateLeaseTable($entry);
    redirect_to(url_for('/files/lease/index.php'));


}


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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/Team-Clean.css">
</head>

<body>
</body>


<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Edit</strong>&nbsp;Tenancy</h2>
            <form action="<?php echo url_for('/files/lease/edit.php?id=' . h(u($id))); ?>" method="post">

                <div class="form-grou§p"><label class="text-secondary">Monthly Rent</label><input
                            name="leaseMonthlyRent"
                            value="<?php echo h($row['leaseMonthlyRent']) ?>"
                            class="form-control"
                            type="number"
                            required="">
                </div>
                <div class="form-group"><label class="text-secondary">Utilities</label><input name="leaseUtilities"
                                                                                              value="<?php echo h($row['leaseUtilities']) ?>"
                                                                                              class="form-control"
                                                                                              type="number" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Payment Method</label><input
                            name="leasePaymentMethod"
                            value="<?php echo h($row['leasePaymentMethod']) ?>" class="form-control"
                            type="text"
                            required=""></div>
                <div class="form-group"><label class="text-secondary">Deposit</label><input name="leaseDeposit"
                                                                                            value="<?php echo h($row['leaseDeposit']) ?>"
                                                                                            class="form-control"
                                                                                            type="text" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Start</label><input name="leaseStart"
                                                                                                value="<?php echo h($row['leaseStart']) ?>"
                                                                                                class="form-control"
                                                                                                type="date" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Expiry</label><input name="leaseEnd"
                                                                                                 value="<?php echo h($row['leaseEnd']) ?>"
                                                                                                 class="form-control"
                                                                                                 type="date"
                                                                                                 required=""></div>
                <div class="form-group">
                    <label class="text-secondary">Property</label>
                    <select name="propertytable_propertyID">

                        <?php

                        $sql = "SELECT propertyID FROM propertytable ORDER BY propertyID";
                        $result = mysqli_query($db, $sql);
                        while ($prow = mysqli_fetch_array($result)) {
                            $identity = $prow['propertyID'];

                            echo($pID == $identity ? "<option selected value='$identity'>$identity</option>" : "<option value='$identity'>$identity</option>");
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label class="text-secondary">Tenant</label>
                    <select name="tenanttable_tenantID">

                        <?php

                        $sql = "SELECT tenantID, tenantLastName, tenantFirstName FROM tenanttable ORDER BY tenantID";
                        $result = mysqli_query($db, $sql);
                        while ($trow = mysqli_fetch_array($result)) {
                            $tidentity = $trow['tenantID'];
                            $tName = $trow['tenantLastName'] . " " . $trow['tenantFirstName'];

                            echo($tID == $tidentity ? "<option selected value='$tidentity'>$tName</option>" : "<option value='$tidentity'>$tName</option>");
                        }
                        ?>
                    </select>

                </div>


                <div>
                    <input type="submit" value="Edit Lease"/>
                </div>
            </form>


        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>

</body>

</html>

