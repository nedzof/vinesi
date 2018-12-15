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
            <td><?php echo TemplateView::noHTML($lease->getLeasemonthlyent()); ?></td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseutilities()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasepaymentmethod()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasedeposit()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeasestartDate()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getLeaseendDate()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getPropertytablePropertyid()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getTenttableTenantid()); ?> </td>
            <td><?php echo TemplateView::noHTML($lease->getTenant($lease->getTenttableTenantid())); ?> </td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <a class="btn btn-default" role="button" href="lease/update?id=<?php echo $lease->getLeaseid(); ?>"><i
                                class="fa fa-edit"></i></a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
                        <i class="ion-android-delete"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Deleting Lease</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Mr Andreas Martin, do you want to delete this Lease?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary"
                                    ="lease/delete?id=<?php echo $lease->getLeaseid(); ?>">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </td>
        </tr>
    <?php endforeach;
    ?>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="lease/create"> <i class="fa fa-plus-square-o"></i></a>
        <a target="_blank" class="btn btn-default" role="button" href="lease/pdf"> <i class="fa fa-file-pdf-o"></i></a>
        <a class="btn btn-default" role="button" href="lease/email"> <i class="fa fa-envelope-o"></i></a>
    </div>
    </tbody>
</table>
</div>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>