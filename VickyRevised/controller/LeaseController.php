<?php

namespace controller;

use http\HTTPStatusCode;
use router\Router;
use service\LeaseServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 07/12/2018
 * Time: 17:39
 */
class LeaseController{

    public static function leaseView()
    {
        $contentView = new TemplateView("lease_index.php");
        LayoutRendering::basicLayout($contentView);
    }

    public static function create(){

    }

    public static function edit(){

        if (!isset($_GET['id'])) {
            Router::redirect("/lease_index.php");
        }

        $id = $_GET["id"];
        $contentView = new TemplateView("lease_edit.php");
        try {
            $contentView->lease = (new LeaseServiceImpl())->readLease($id);
            LayoutRendering::basicLayout($contentView);
        } catch (\http\HTTPException $e) {
            HTTPStatusCode::HTTP_401_UNAUTHORIZED;

        }


    }

    public static function delete(){

    }
}