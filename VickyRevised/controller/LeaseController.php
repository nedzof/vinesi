<?php

namespace controller;

use dao\LeaseDAO;
use http\HTTPException;
use http\HTTPStatusCode;
use router\Router;
use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:39
 */
class LeaseController{

    public static function create()
    {

    }

    public static function leaseView()
    {
        try {

            $contentView = new TemplateView("lease.php");
            $contentView->leases = (new LeaseDAO())->getAllLeases();
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

    public static function edit(){

        if (!isset($_GET['id'])) {
            Router::redirect("/lease.php");
        }

        $id = $_GET["id"];

        try {
            $contentView = new TemplateView("lease_edit.php");
            // $contentView->lease = (new LeaseServiceImpl())->findLeaseById($id);
            $contentView->lease = (new LeaseDAO())->getLeaseById($id);
            LayoutRendering::basicLayout($contentView);
        } catch (HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;

        }


    }

    public static function delete(){

    }

}