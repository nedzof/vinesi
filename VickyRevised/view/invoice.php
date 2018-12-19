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
                <td><?php echo TemplateView::noHTML($invoice->getInvoicestartdate()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoiceenddate()); ?></td>
                <td><?php echo TemplateView::noHTML($invoice->getInvoicedaysleft()); ?></td>

                <?php if ($invoice->getInvoicepaid() == 0) { ?>
                    <td style="background:#efa2a9">NO</td>
                <?php } else { ?>
                    <td style="background:#71dd8a">YES</td>
                <?php } ?>


                <td>
                    <div role="group">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ModalCenter">
                            <i class="ion-android-delete"></i>
                        </button>
                        <a class="btn btn-default" role="button"
                           href="invoice/update?id=<?php echo $invoice->getInvoiceid(); ?>"><i
                                    class="fa fa-edit"></i></a>
                    </div>
                </td>

                <!-- Modal -->
                <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Deleting Invoice</h5>
                            </div>
                            <div class="modal-body">
                                <p>Mr Andreas Martin, do you want to delete this
                                    Invoice?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" data-method="get"

                                        onclick="location.href='invoice/delete?id=<?php echo $invoice->getInvoiceid(); ?>'">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>