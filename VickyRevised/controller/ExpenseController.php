<?php

namespace controller;

use dao\ExpenseDAO;
use domain\Expense;
use http\HTTPException;
use http\HTTPStatusCode;
use service\ExpenseServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:40
 */
class ExpenseController{

    public static function expenseView()
    {
        try {

            $contentView = new TemplateView("expense.php");
            $contentView->expenses = (new ExpenseDAO())->getAllExpenses();
            LayoutRendering::basicLayout($contentView);

            /*
            $contentView = new TemplateView("lease.php");
            $contentView->leases = (new LeaseServiceImpl())->findAllLeases();
            LayoutRendering::basicLayout($contentView);
*/
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;

        }

    }


    public static function expenseUpdateOrCreate(){
    try {
        $expense = new Expense();
        $expense->setExpenseid($_POST["expenseid"] ?? 0);
        $expense->setExpensetype($_POST["expensetype"] ?? "");
        $expense->setExpenseamount($_POST["expenseamount"] ?? 0);
        $expense->setExpensestartdate($_POST["expensestartdate"] ?? date("Y-m-d"));
        $expense->setExpensepaid($_POST["expensepaid"] ?? false);
        if ($expense->getExpenseid() == 0) {
            return (new ExpenseServiceImpl())->createExpense($expense);
        } else {
            return (new ExpenseServiceImpl())->updateExpense($expense);

        }

    } catch (HTTPException $e) {

        }
    }

    public static function deleteExpense($id)
    {
        return (new ExpenseServiceImpl())->deleteExpense($id);
    }

    public static function createExpenseForm(){
        $id = $_GET["id"] ?? 0;
        try {
            $contentView = new TemplateView("expense_form.php");
            if ($id != 0) {
                $contentView->expense = (new ExpenseDAO())->getExpenseById($id);
            }
            LayoutRendering::basicLayout($contentView);
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;


        }
    }

}