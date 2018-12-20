<?php
/**
 * Created by PhpStorm.
 * User: Nedzo
 * Date: 20.12.2018
 * Time: 19:10
 */
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<body>
<table class="table" id="mytable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Lease Date</th>
        <th>Lease Due</th>
        <th>Days Remaining</th>
        <th>Paid</th>

    </tr>
    </thead>

    <?php

    foreach ($this->leasing as $lease):?>
        <tr>
            <td><?php echo TemplateView::noHTML($lease->getLeaseid()); ?></td>
            <td><?php echo TemplateView::noHTML($lease->getLeasemonthlyrent()); ?></td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseutilities()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasepaymentmethod()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasedeposit()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasestartDate(true)); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseendDate(true)); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getPropertytablePropertyid()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getTenttableTenantid()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getTenant($lease->getTenttableTenantid())); ?> </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
