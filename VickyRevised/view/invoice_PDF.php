<?php
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<body>

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
    foreach ($this->invoicing as $invoice):/*@var invoice $invoice*/
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

        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>