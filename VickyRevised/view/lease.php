<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */

namespace domain;

use view\TemplateView;

?>
<!DOCTYPE html>
<html>
<body>
<table class="table">
    <thead>
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
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($this->leases as $lease): /* @var lease $lease */ ?>
        <tr>
            <td><?php echo TemplateView::noHTML($lease->getLeaseid()); ?></td>
            <td><?php echo TemplateView::noHTML($lease->getLeasemonthylrent()); ?></td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseutilities()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasedeposit()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasestart()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseend()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getPropertytablePropertyid()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getTenttableTenantid()); ?> </td>

            <div class="btn-group" role="group">
                <a class="btn btn-default" role="button" href="lease/create"> <i class="fa fa-plus-square-o"></i></a>
                <a target="_blank" class="btn btn-default" role="button" href="lease/pdf"> <i
                            class="fa fa-file-pdf-o"></i></a>
                <a class="btn btn-default" role="button" href="lease/email"> <i class="fa fa-envelope-o"></i></a>
            </div>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <a class="btn btn-default" role="button" href="lease/edit?id=<?php echo $lease->getId(); ?>"> <i
                                class="fa fa-edit"></i></a>
                    <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal"
                            data-href="lease/delete?id=<?php echo $lease->getId(); ?>"><i
                                class="glyphicon glyphicon-trash"></i></button>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>
</html>