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
    /**
     * @access public
     * @param Expense expense
     * @return Expense
     * @ParamType Expense expense
     * @ReturnType Expense
     * @throws HTTPException
     */
    public function createExpense(Expense $expense)
    {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $expenseDAO = new ExpenseDAO();
        //$lease->set(AuthServiceImpl::getInstance()->getCurrentUserId());
        return $expenseDAO->create($expense);
    }

    /**
     * @access public
     * @param int expenseId
     * @return Expense
     * @ParamType expenseId int
     * @ReturnType Expense
     * @throws HTTPException
     */
    public function readExpense($expenseId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->readById($expenseId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param Expense expense
     * @return Expense
     * @ParamType Expense expense
     * @ReturnType Expense
     * @throws HTTPException
     */
    public function updateExpense(Expense $expense)
    {//if (AuthServiceImpl::getInstance()->verifyAuth()) {
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->update($expense);
        //}
        //throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);

    }

    /**
     * @access public
     * @param int expenseId
     * @ParamType expenseId int
     */
    public function deleteExpense($expenseId)
    {
        //if(AuthServiceImpl::getInstance()->verifyAuth()) {
        $expenseDAO = new ExpenseDAO();
        $expense = new Expense();
        $expense->setExpenseid($expenseId);
        return $expenseDAO->delete($expense);
        //}
    }

    /**
     * @access public
     * @return Expense[]
     * @ReturnType Expense[]
     * @throws HTTPException
     */
    public function findAllExpenses()
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $expenseDAO = new ExpenseDAO();
            return $expenseDAO->getAllExpenses();
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @return Expense[]
     * @ReturnType Expense[]
     * @throws HTTPException
     */
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
        $expenseDAO = new ExpenseDAO();
        return $expenseDAO->getExpenseSum();
    }


}