<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php

//if (!isset($_GET['id']) || !isset($_GET['pID']) || !isset($_GET['tID'])) {
if (!isset($_GET['id'])) {

    redirect_to(url_for('/files/index.php'));
}
$entry = [];
$id = $_GET['id'];
$row = getLeaseTable_By_ID($id)[0];


if (is_post_request()) {



    $entry['leaseid'] = $row['leaseid'] ?? 1;
    $entry['leasemonthlyrent'] = $_POST['leasemonthlyrent'] ?? '';
    $entry['leaseutilities'] = $_POST['leaseutilities'] ?? '';
    $entry['leasepaymentmethod'] = $_POST['leasepaymentmethod'] ?? '';
    $entry['leasedeposit'] = $_POST['leasedeposit'] ?? '';
    $entry['leasestart'] = $_POST['leasestart'] ?? '';
    $entry['leaseend'] = $_POST['leaseend'] ?? '';
    $entry['propertytable_propertyid'] = $_POST['propertytable_propertyid'] ?? 11;
    $entry['tenttable_tenantid'] = $_POST['tenttable_tenantid'] ?? 1;


    $pID = $entry['propertytable_propertyid'];
    $tID = $entry['tenttable_tenantid'];


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
                            name="leasemonthlyrent"
                            value="<?php echo h($row['leasemonthlyrent']) ?>"
                            class="form-control"
                            type="number"
                            required="">
                </div>
                <div class="form-group"><label class="text-secondary">Utilities</label><input name="leaseutilities"
                                                                                              value="<?php echo h($row['leaseutilities']) ?>"
                                                                                              class="form-control"
                                                                                              type="number" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Payment Method</label><input
                            name="leasepaymentmethod"
                            value="<?php echo h($row['leasepaymentmethod']) ?>" class="form-control"
                            type="text"
                            required=""></div>
                <div class="form-group"><label class="text-secondary">Deposit</label><input name="leasedeposit"
                                                                                            value="<?php echo h($row['leasedeposit']) ?>"
                                                                                            class="form-control"
                                                                                            type="text" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Start</label><input name="leasestart"
                                                                                                value="<?php echo h($row['leasestart']) ?>"
                                                                                                class="form-control"
                                                                                                type="date" required="">
                </div>
                <div class="form-group"><label class="text-secondary">Lease Expiry</label><input name="leaseend"
                                                                                                 value="<?php echo h($row['leaseend']) ?>"
                                                                                                 class="form-control"
                                                                                                 type="date"
                                                                                                 required=""></div>
                <div class="form-group">
                    <label class="text-secondary">Property</label>
                    <select name="propertytable_propertyid">

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
                    <select name="tenttable_tenantid">

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

