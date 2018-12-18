<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 18/12/2018
 * Time: 11:40
 */
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<body>
<div class="intro">
    <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Invoices</strong></h2>
    <p class="text-center" style="color: #a2a8ae;">Overview of all invoices issued.</p>
</div>
<table class="table">
    <thead>
    <tr class="header">
        <th>ID</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Invoice Date</th>
        <th>Invoice Paid</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($this->invoices as $invoice):/*@var invoice $invoice*/?>
        <tr>
            <td><?php echo TemplateView::noHTML($invoice->getInvoiceid()); ?></td>
            <td><?php echo TemplateView::noHTML($invoice->getInvoicetype()); ?></td>
            <td><?php echo TemplateView::noHTML($invoice->getInvoiceamount()); ?></td>
            <td><?php echo TemplateView::noHTML($invoice->getInvoicestartdate()); ?></td>
            <td><?php echo TemplateView::noHTML($invoice->getInvoicepaiddate()); ?></td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                    <a class="btn btn-default" role="button" href="invoice/update?id=<?php echo $invoice->getInvoiceid(); ?>">
                        <i class="fa fa-edit"></i></a>
                    <!-- Delete Button Trigger -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
                        <i class="ion-android-delete"></i>
                    </button>
                    <!-- Delete -->
                    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Invoice</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete the
                                        Invoice <? echo $invoice->getInvoiceid(); ?> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" data-method="delete"
                                            href="invoice/delete/<?php echo $invoice->getInvoiceid(); ?>
                                            class="btn btn-primary
                                    ">Delete</button>
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
        <a class="btn btn-default" role="button" href="invoice/create"> <i class="fa fa-plus-square-o"></i></a>
        <a target="_blank" class="btn btn-default" role="button" href="invoice/pdf"> <i
                class="fa fa-file-pdf-o"></i></a>
        <a class="btn btn-default" role="button" href="invoice/email"> <i class="fa fa-envelope-o"></i></a>
    </div>
    </tbody>
</table>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>