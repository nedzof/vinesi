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
        print_r($result[0]);
        echo $result[0]->leaseid;
        /* for ($i = 0;$i < count($result);$i++){
         $row = $result[$i];
         ?>
         */ ?>
    </tr>
    <tr>

    </tr>
    <?php //} ?>

</table>
</body>
</html>