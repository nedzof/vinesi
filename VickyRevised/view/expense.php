<?php
namespace domain;

use view\TemplateView;

?>

<!DOCTYPE html>
<html>
<head>
    <script src="assets/js/Sorttable.js"></script>
</head>
<body>
    <div class="page-header">
        <h2 class="text-center">My <strong>expenses</strong>.</h2></div>
    <div>
        <table class="table" id="mytable">
            <thead>
            <tr>
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">ExpenseType</th>
                <th onclick="sortTable(2)">Amount</th>
                <th onclick="sortTable(3)">Expense Date</th>
                <th onclick="sortTable(4)">Expense Due</th>
                <th onclick="sortTable(5)">Days Remaining</th>
                <th onclick="sortTable(6)"></th>

            </tr>
            </thead>

            <?php
            foreach ($this->expenses as $expense):/*@var expense $expense*/
                ?>
                <tr>
                    <td><?php echo TemplateView::noHTML($expense->getExpenseid()); ?></td>
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


                    <td>
                        <div role="group">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ModalCenter">
                                <i class="ion-android-delete"></i>
                            </button>
                            <a class="btn btn-default" role="button"
                               href="expense/update?id=<?php echo $expense->getExpenseid(); ?>"><i
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Deleting Expense</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Mr Andreas Martin, do you want to delete this
                                        Expense?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-method="get"

                                            onclick="location.href='lease/delete?id=<?php echo $expense->getExpenseid(); ?>'">
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