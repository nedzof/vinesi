<?php
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<body>
<div class="page-header">
    <h2 class="text-center">My <strong>invoices</strong>.</h2></div>
<div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Lease ID</th>
            <th>Invoice Date</th>
            <th>Invoice Due</th>
            <th>Days Remaining</th>
            <th>Invoice Paid</th>

        </tr>
        </thead>

        <?php
        foreach ($this->invoices as $invoice):/*@var invoice $invoice*/
            ?>
            <tr>
                <td><?php echo TemplateView::noHTML($invoice->getInvoiceid()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoicetype()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoiceamount()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoiceleaseid()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoicestartdate()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoiceenddate(0)); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoicedaysleft(0)); ?></td>

                <?php if ($invoice->getInvoicepaid() == 0) { ?>
                    <td style="background:#efa2a9">NO</td>
                <?php } else { ?>
                    <td style="background:#71dd8a">YES</td>
                <?php } ?>


                <td>
                    <div role="group">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ModalCenter<?php echo $invoice->getInvoiceid() ?>">
                            <i class="ion-android-delete"></i>
                        </button>
                        <a class="btn btn-default" role="button"
                           href="invoice/update?id=<?php echo $invoice->getInvoiceid() ?>"><i
                                    class="fa fa-edit"></i></a>
                    </div>


                    <div class="modal fade" id="ModalCenter<?php echo $invoice->getInvoiceid() ?>" tabindex="-1"
                         role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Deleting Expense</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Mr Andreas Martin, do you want to delete this Expense?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-default" role="button"
                                       href="invoice/delete?id=<?php echo $invoice->getInvoiceid() ?>"><i
                                                class="ion-android-delete"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>


        <div role="group">
            <a class="btn btn-default" role="button" href="invoice/create"> <i class="fa fa-plus-square-o"></i></a>
            <a target="_blank" class="btn btn-default" role="button" href="invoice/pdf"> <i
                        class="fa fa-file-pdf-o"></i></a>
            <a class="btn btn-default" role="button" href="invoice/email"> <i class="fa fa-envelope-o"></i></a>
            <a class="btn btn-default" role="button" href="invoice/generateaverageinvoice"> <i class="ion-document"></i></a>
            <a class="btn btn-default" role="button" href="invoice/billmonthlyrent"> <i class="ion-card"></i></a>

        </div>
    </table>
</div>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>