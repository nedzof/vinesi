<?php
/**
 * Created by PhpStorm.
 * User: Victoria Villar
 * Date: 11/12/2018
 * Time: 14:29
 */

namespace service;

use domain\Tenant;

interface TenantService
{

    /**
     * @access public
     * @param Tenant tenant
     * @return Tenant
     * @ParamType Tenant tenant
     * @ReturnType Tenant
     */
    public function createTenant(Tenant $tenant);

    /**
     * @access public
     * @param int tenantId
     * @return Tenant
     * @ParamType tenantId int
     * @ReturnType Tenant
     */
    public function readTenant($tenantId);

    /**
     * @access public
     * @param Tenant tenant
     * @return Tenant
     * @ParamType Tenant tenant
     * @ReturnType Tenant
     */
    public function updateTenant(Tenant $tenant);

    /**
     * @access public
     * @param int tenantId
     * @ParamType tenantId int
     */
    public function deleteTenant($tenantId);

    /**
     * @access public
     * @return Tenant[]
     * @ReturnType Tenant[]
     */
    public function findAllTenants();

}