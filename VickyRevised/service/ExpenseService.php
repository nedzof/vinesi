<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 17/12/2018
 * Time: 11:59
 */

namespace service;

use domain\Expense;

interface ExpenseService
{

    /**
     * @access public
     * @param Expense expense
     * @return Expense
     * @ParamType Expense expense
     * @ReturnType Expense
     */
    public function createExpense(Expense $expense);

    /**
     * @access public
     * @param int expenseId
     * @return Expense
     * @ParamType expenseId int
     * @ReturnType Expense
     */
    public function readExpense($expenseId);

    /**
     * @access public
     * @param Expense expense
     * @return Expense
     * @ParamType Expense expense
     * @ReturnType Expense
     */
    public function updateExpense(Expense $expense);

    /**
     * @access public
     * @param int expenseId
     * @ParamType expenseId int
     */
    public function deleteExpense($expenseId);

    /**
     * @access public
     * @return Expense[]
     * @ReturnType Expense[]
     */
    public function findAllExpenses();

}