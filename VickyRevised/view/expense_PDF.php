<?php
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
        <th>Expense Date</th>
        <th>Expense Due</th>
        <th>Days Remaining</th>
        <th>Paid</th>

    </tr>
    </thead>

    <?php
    foreach ($this->spending as $expense):/*@var expense $expense*/
        ?>
        <tr>
            <td><?php echo TemplateView::noHTML($expense->getExpenseid()) ?></td>
            <td><?php echo TemplateView::noHTML($expense->getExpensetype()); ?></td>
            <td><?php echo TemplateView::noHTML($expense->getExpenseamount()); ?></td>
            <td><?php echo TemplateView::noHTML($expense->getExpensestartdate()); ?></td>
            <td><?php echo TemplateView::noHTML($expense->getExpenseenddate()); ?></td>
            <td><?php echo TemplateView::noHTML($expense->getExpensedaysleft()); ?></td>

            <?php if ($expense->getExpensepaid() == 0) { ?>
                <td style="background:#efa2a9">NO</td>
            <?php } else { ?>
                <td style="background:#71dd8a">YES</td>
            <?php } ?>

            </td>
        </tr>
    <?php endforeach; ?>

</table>
</div>
</body>
</html>