<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php

if (!isset($_GET['id']) || !isset($_GET['pID'])) {
    redirect_to(url_for('files/index.php'));
}
$pID = $_GET['pID'];
$id = $_GET['id'];
$singlerow = getLeaseTable_By_ID($id);

if (is_post_request()) {


    echo $singlerow['leaseMonthlyRent'];

    $entry = [];
    $entry['leaseID'] = $singlerow['leaseID'] ?? 1;
    $entry['leaseMonthlyRent'] = $_POST['leaseMonthlyRent'] ?? '';
    $entry['leaseUtilities'] = $_POST['leaseUtilities'] ?? '';
    $entry['leasePaymentMethod'] = $_POST['leasePaymentMethod'] ?? '';
    $entry['leaseDeposit'] = $_POST['leaseDeposit'] ?? '';
    $entry['leaseStart'] = $_POST['leaseStart'] ?? '';
    $entry['leaseEnd'] = $_POST['leaseEnd'] ?? '';
    $entry['propertytable_propertyID'] = $_POST['propertytable_propertyID'] ?? 11;
    $entry['tenanttable_tenantID'] = $_POST['tenanttable_tenantID'] ?? 1;


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
                            value="<?php echo h($singlerow['leaseMonthlyRent']) ?>"
                            class="form-control"
                            type="number"
                            required="">
                </div>
                <div class="form-group"><label class="text-secondary">Utilities</label><input name="leaseUtilities"
                                                                                              value="<?php echo h($singlerow['leaseUtilities']) ?>"
                                                                                              class="form-control"
                                                                                              type="number" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Payment Method</label><input
                            name="leasePaymentMethod"
                            value="<?php echo h($singlerow['leasePaymentMethod']) ?>" class="form-control"
                            type="text"
                            required=""></div>
                <div class="form-group"><label class="text-secondary">Deposit</label><input name="leaseDeposit"
                                                                                            value="<?php echo h($singlerow['leaseDeposit']) ?>"
                                                                                            class="form-control"
                                                                                            type="text" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Start</label><input name="leaseStart"
                                                                                                value="<?php echo h($singlerow['leaseStart']) ?>"
                                                                                                class="form-control"
                                                                                                type="date" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Expiry</label><input name="leaseEnd"
                                                                                                 value="<?php echo h($singlerow['leaseEnd']) ?>"
                                                                                                 class="form-control"
                                                                                                 type="date"
                                                                                                 required=""></div>
                <div class="form-group">
                    <label class="text-secondary">Property</label>
                    <select name="propertytable_propertyID">

                        <?php

                        $sql = "SELECT propertyID, propertyLeasedBy FROM propertytable ORDER BY propertyID";
                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $identity = $row['propertyID'];

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
                        while ($singlerow = mysqli_fetch_array($result)) {
                            $id = $singlerow['tenantID'];
                            $tenantName = $singlerow['tenantLastName'] . " " . $singlerow['tenantFirstName'];


                            echo "<option value='$id'>$tenantName</option>";
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

