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
use http\HTTPStatusCode;

class TenantServiceImpl implements TenantService
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
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $tenantDAO = new TenantDAO();
            //$tenant->set(AuthServiceImpl::getInstance()->getCurrentUserId());
            return $tenantDAO->create($tenant);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $tenantDAO = new TenantDAO();
            return $tenantDAO->readTenantById($tenantId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
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
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $tenantDAO = new TenantDAO();
            return $tenantDAO->update($tenant);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    /**
     * @access public
     * @param int tenantId
     * @ParamType tenantId int
     */
    public function deleteTenant($tenantId)
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $tenantDAO = new TenantDAO();
            $tenant = new Tenant();
            $tenant->setTenantid($tenantId);
            $tenantDAO->delete($tenant);
        }
    }

    /**
     * @access public
     * @return Tenant[]
     * @ReturnType Tenant[]
     * @throws HTTPException
     */
    public function findAllTenants()
    {
        if (AuthServiceImpl::getInstance()->verifyAuth()) {
            $tenantDAO = new TenantDAO();
            return $tenantDAO->getAllTenants(AuthServiceImpl::getInstance()->getCurrentUserId());
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function getDropDownTenants($id){
        $tenantlist = [];

        $tenantDAO = new TenantDAO();
        $result = $tenantDAO->readAll();

        for ($i = 0; $i < count($result); $i++) {
            $lastnametenant = $result[$i]['tenantlastname'];
            $firstname = $result[$i]['tenantfirstname'];
            $name = $lastnametenant . " " . $firstname;
            echo($result[$i]['tenantid'] == $id ?
                array_push($tenantlist, "<option selected value='$lastnametenant'>$name</option>") :
                array_push($tenantlist, "<option value='$lastnametenant'>$name</option>"));
        }
        return $tenantlist;
    }

    public function getTenantlastnameById($id)
    {
        $tenantDAO = new TenantDAO();
        return $tenantDAO->getTenantLastNameById($id);

    }


}