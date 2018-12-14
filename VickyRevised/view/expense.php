<?php
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<body>
<div class="intro">
    <h2 class="text-center" style="margin-bottom: 40px;padding-top: 40px;"><strong>Expenses</strong></h2>
    <p class="text-center" style="color: #a2a8ae;">Overview of all expenses during a weeks time.</p>
</div>
<table class="table">
    <thead>
    <tr class="header">
        <th>ID</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Expense Date</th>
        <th>Expense Paid</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($this->expenses as $expense):/*@var expense $expense*/?>
    <tr>
        <td><?php echo TemplateView::noHTML($expense->getExpenseid()); ?></td>
        <td><?php echo TemplateView::noHTML($expense->getExpensetype()); ?></td>
        <td><?php echo TemplateView::noHTML($expense->getExpenseamount()); ?></td>
        <td><?php echo TemplateView::noHTML($expense->getExpensestartdate()); ?></td>
        <td><?php echo TemplateView::noHTML($expense->getExpensepaid()); ?></td>


        <div class="btn-group btn-group-sm" role="group">
            <a class="btn btn-default" role="button" href="expense/edit?id=<?php echo $expense->getExpenseid(); ?>">
                <i class="fa fa-edit"></i></a>
            <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal"
                    data-href="expense/delete?id=<?php echo $expense->getExpenseid(); ?>"><i
                        class="glyphicon glyphicon-trash"></i></button>
        </div>
        </td>
    </tr>
    <?php endforeach;
    ?>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="lease/create"> <i class="fa fa-plus-square-o"></i></a>
        <a target="_blank" class="btn btn-default" role="button" href="lease/pdf"> <i
                    class="fa fa-file-pdf-o"></i></a>
        <a class="btn btn-default" role="button" href="lease/email"> <i class="fa fa-envelope-o"></i></a>
    </div>
    </tbody>
</table>
</div>
</body>
</html>