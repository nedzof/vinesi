<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Vinesi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet"
          href="../../vinesi/public/assets/css/Data-Summary-Panel---3-Column-Overview--Mobile-Responsive.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body>
</body>

<?php
//False for Create, True for Update
$createOrUpdate = !empty($this->lease) ?>
<div class="projects-horizontal">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-weight: normal;">
                <strong><?php echo $createOrUpdate ? "Update" : "Create" ?></strong>&nbsp;Tenancy</h2>
            <form action="<?php echo $createOrUpdate ? "update" : "create" ?>" method="post">

                <?php if ($createOrUpdate) { ?>
                <div class="form-grou§p"><label class="text-secondary">LeaseID</label><input
                            name="leaseid"
                            value="<?php echo $createOrUpdate ? $this->lease->getLeaseid() : 0 ?>"
                            class="form-control"
                            type="number"
                            required=""
                            readonly="readonly">

                    <?php } ?>

                    <div class="form-grou§p"><label class="text-secondary">Monthly Rent</label><input
                                name="leasemonthlyrent"
                                value="<?php echo $createOrUpdate ? $this->lease->getLeasemonthlyent() : 0 ?>"
                                class="form-control"
                                type="number"
                                required="">
                    </div>
                    <div class="form-group"><label class="text-secondary">Utilities</label><input name="leaseutilities"
                                                                                                  value="<?php echo $createOrUpdate ? $this->lease->getLeaseutilities() : 0 ?>"
                                                                                                  class="form-control"
                                                                                                  type="number" required="">
                    </div>
                    <div class="form-group"><label class="text-secondary">Payment Method</label><input
                                name="leasepaymentmethod"
                                value="<?php echo $createOrUpdate ? $this->lease->getLeasepaymentmethod() : "" ?>"
                                class="form-control"
                                type="text"
                                required=""></div>
                    <div class="form-group"><label class="text-secondary">Deposit</label><input name="leasedeposit"
                                                                                                value="<?php echo $createOrUpdate ? $this->lease->getLeasedeposit() : 0 ?>"
                                                                                                class="form-control"
                                                                                                type="number" required="">
                    </div>
                    <div class="form-group"><label class="text-secondary">Lease Start</label><input name="leasestart"
                                                                                                    value="<?php echo $createOrUpdate ? $this->lease->getLeasestartDate() : date("Y-m-d"); ?>"
                                                                                                    class="form-control"
                                                                                                    min="<?php echo date("Y-m-d") ?>"
                                                                                                    type="date" required="">
                    </div>
                    <div class="form-group"><label class="text-secondary">Lease Expiry</label><input name="leaseend"
                                                                                                     value="<?php echo $createOrUpdate ? $this->lease->getLeaseendDate() : date("Y-m-d"); ?>"
                                                                                                     class="form-control"
                                                                                                     type="date"
                                                                                                     required="">
                    </div>


                    <div class="form-group">
                        <label class="text-secondary">Property</label>
                        <select name="propertytable_propertyid">


                            <?php

                            $piD = 0;
                            if ($createOrUpdate) {
                                $pID = $this->lease->getPropertytablePropertyid();
                            } else {
                                $pID = 1;
                            }
                            $properties = (new service\PropertyServiceImpl())->getDropDownProperties($pID);
                            foreach ($properties as $property) {
                                echo $property;

                            } ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <label class="text-secondary">Tenant</label>
                        <select name="tenttable_tenantid">


                            <?php

                            $tiD = 0;
                            if ($createOrUpdate) {
                                $tID = $this->lease->getTenttableTenantid();
                            } else {
                                $tID = 1;
                            }

                            $tenants = (new service\TenantServiceImpl())->getDropDownTenants($tID);
                            foreach ($tenants as $tenant) {
                                echo $tenant;
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

