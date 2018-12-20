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
<div class="page-header">
    <h2 class="text-center">My <strong>leases</strong>.</h2></div>
<div>
    <table class="table">
        <thead>
        <tr>
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

        foreach ($this->leases as $lease): /* @var lease $lease */
            $a = $lease->getLeaseid(); ?>
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

                <td>
                    <div role="group">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ModalCenter<?php echo $lease->getLeaseid() ?>">
                            <i class="ion-android-delete"></i>
                        </button>
                        <a class="btn btn-default" role="button"
                           href="lease/update?id=<?php echo $lease->getLeaseid() ?>"><i
                                    class="fa fa-edit"></i></a>
                    </div>


                    <div class="modal fade" id="ModalCenter<?php echo $lease->getLeaseid() ?>" tabindex="-1"
                         role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Deleting Lease</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Mr Andreas Martin, do you want to delete this Lease?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-default" role="button"
                                       href="lease/delete?id=<?php echo $lease->getLeaseid() ?>"><i
                                                class="ion-android-delete"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </td>
            </tr>
<?php endforeach; ?>


        <div role="group">
            <a class="btn btn-default" role="button" href="lease/create"> <i class="fa fa-plus-square-o"></i></a>
            <a target="_blank" class="btn btn-default" role="button" href="lease/pdf"> <i class="fa fa-file-pdf-o"></i></a>
            <a class="btn btn-default" role="button" href="lease/email"> <i class="fa fa-envelope-o"></i></a>
        </div>
    </table>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>