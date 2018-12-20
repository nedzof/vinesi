<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 17/12/2018
 * Time: 11:59
 */

namespace service;


use dao\ExpenseDAO;
use domain\Expense;


class ExpenseServiceImpl
{

    public function createExpense(Expense $expense)
    {
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->create($expense);


    }

    public function readExpense($expenseId)
    {

        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->readById($expenseId);

    }


    public function updateExpense(Expense $expense)
    {
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->update($expense);


    }

    public function deleteExpense($expenseId)
    {
        $expenseDAO = new ExpenseDAO();
        $expense = new Expense();
        $expense->setExpenseid($expenseId);
        return $expenseDAO->delete($expense);
    }


    public function findAllExpenses()
    {
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->getAllExpenses();
    }


    public function findLeaseById($id)
    {
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->getExpenseById($id);
    }

    public function getExpenseSumImpl()
    {

        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->getExpenseSum();
    }


}