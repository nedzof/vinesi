<?php

namespace controller;


use dao\ExpenseDAO;
use http\HTTPException;
use http\HTTPStatusCode;
use router\Router;
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


    public static function readAll(){

    }

    public static function edit(){

    }

    public static function create(){

    }
    public static function delete(){

    }

}