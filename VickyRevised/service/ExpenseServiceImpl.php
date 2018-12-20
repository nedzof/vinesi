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
use http\HTTPException;
use http\HTTPStatusCode;


class ExpenseServiceImpl implements ExpenseService
{

    public function createExpense(Expense $expense)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->create($expense);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    public function readExpense($expenseId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->readById($expenseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


    public function updateExpense(Expense $expense)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->update($expense);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    public function deleteExpense($expenseId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            $expense = new Expense();
            $expense->setExpenseid($expenseId);
            return $expenseDAO->delete($expense);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }


    public function findAllExpenses()
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->getAllExpenses();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


    public function findLeaseById($id)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->getExpenseById($id);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function getExpenseSumImpl()
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {

            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->getExpenseSum();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }


}