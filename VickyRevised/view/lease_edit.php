<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="../../vinesi/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet"
          href="../../vinesi/public/assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Data-Table.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../../vinesi/public/assets/css/Team-Clean.css">
</head>

<body>
</body>


<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;"><strong>Edit</strong>&nbsp;Tenancy</h2>
            <form action="<?php echo url_for('/files/lease/lease_edit.php?id=' . h(u($id))); ?>" method="post">

                <div class="form-grou§p"><label class="text-secondary">Monthly Rent</label><input
                            name="leasemonthlyrent"
                            value="<?php echo  ?>"
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
                        global $db;

                        $result1 = getPropertyIdsByLeaseIds();
                        print_r($result1);
                        for ($i = 0; $i < count($result1); $i++) {
                            $row = $result1[$i];
                            //echo "<option selected value='3'>$row['propertyid']</option>";


                        }

                        echo "<option selected value=''></option>"
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label class="text-secondary">Tenant</label>
                    <select name="tenttable_tenantid">

                        <?php


                        $sql = "SELECT tenantid, tenantlastname, tenantfirstname FROM tenanttable ORDER BY tenantid";
                        $statement_handler = $db->prepare($sql);
                        $statement_handler->execute();
                        //$result1 = $statement_handler->fetchAll(PDO::FETCH_ASSOC);
                        global $id;
                        while ($trow = $statement_handler->fetch(PDO::FETCH_ASSOC)) {
                            $tidentity = (int) $trow['tenantid'];
                            $tenantnumber = getTenantIdByLeaseId($id);
                            $tName = $trow['tenantlastname'] . " " . $trow['tenantfirstname'];

                           echo($tenantnumber == $tidentity ? "<option selected value='$tidentity'>$tName</option>" : "<option value='$tidentity'>$tName</option>");
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

</html>

