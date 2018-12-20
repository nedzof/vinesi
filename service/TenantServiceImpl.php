<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.11.2017
 * Time: 08:09
 */

namespace service;

use dao\TenantDAO;
use domain\Tenant;
use http\HTTPException;

class TenantServiceImpl
{
    /**
     * @access public
     * @param Tenant tenant
     * @return Tenant
     * @ParamType tenant Tenant
     * @ReturnType Tenant
     * @throws HTTPException
     */
    public function createTenant(Tenant $tenant)
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->create($tenant);
    }

    /**
     * @access public
     * @param int tenantId
     * @return Tenant
     * @ParamType tenantId int
     * @ReturnType Tenant
     * @throws HTTPException
     */
    public function readTenant($tenantId)
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->readTenantById($tenantId);
    }

    /**
     * @access public
     * @param Tenant tenant
     * @return Tenant
     * @ParamType tenant Tenant
     * @ReturnType Tenant
     * @throws HTTPException
     */
    public function updateTenant(Tenant $tenant)
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->update($tenant);
    }

    /**
     * @access public
     * @param int tenantId
     * @ParamType tenantId int
     */
    public function deleteTenant($tenantId)
    {

        $tenantDAO = new TenantDAO();
        $tenant = new Tenant();
        $tenant->setTenantid($tenantId);
        $tenantDAO->delete($tenant);

    }


    public function findAllTenants()
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->getAllTenants(AuthServiceImpl::getInstance()->getCurrentUserId());
    }

    public function getDropDownTenants($id)
    {


        $tenantlist = [];

        $result = (new TenantDAO())->readAll();
        for ($i = 0; $i < count($result); $i++) {
            $row = $result[$i];
            $lastnametenant = $row['tenantfirstname'];
            $firstname = $row['tenantlastname'];
            $name = $lastnametenant . " " . $firstname;

            $tenantID = $row['tenantid'];
            $tenantID == $id ?

                $tenantlist[$i] = "<option selected='selected' value='$tenantID'>$name</option>" :
                $tenantlist[$i] = "<option value='$tenantID'>$name</option>";
        }

        return $tenantlist;

    }

    public function getAllTenantDetails()
    {
        return (new TenantDAO())->readAll();

    }

    public function getTenantlastnameById($id)
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->getTenantLastNameById($id);

    }

    public function getNumberOfTenantsImpl()
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->getNumberOfTenants();

    }


}