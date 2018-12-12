<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */

use dao\LeaseDAO;

?>
<!DOCTYPE html>
<html>
<body>
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
        $leasedao = new LeaseDAO();
        $result = $leasedao->readAll();
        print_r($result);
        /* for ($i = 0; $i < count($result); $i++){
         echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
         echo $result[$i]->leaseid;
         $row = $result[$i];
        */ ?>
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
               href="<? //php echo url_for('../public/files/lease/lease_edit.php?id=' . h(u($row['leaseid']))); ?>">Edit</a>
        </td>
        <td><a class="action"
               href="<? //php echo url_for('../public/files/lease/lease_edit.php?id=' . h(u($row['leaseid']))); ?>">Delete</a>
        </td>
    </tr>
    <?php //} ?>

</table>
</body>
</html>