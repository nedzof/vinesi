<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 10.12.18
 * Time: 09:45
 */

namespace domain;


class Tenant
{
    /**
     * @return mixed
     */
    public function getTenantid()
    {
        return $this->tenantid;
    }

    /**
     * @param mixed $tenantid
     */
    public function setTenantid($tenantid): void
    {
        $this->tenantid = $tenantid;
    }

    /**
     * @return mixed
     */
    public function getTenantfirstname()
    {
        return $this->tenantfirstname;
    }

    /**
     * @param mixed $tenantfirstname
     */
    public function setTenantfirstname($tenantfirstname): void
    {
        $this->tenantfirstname = $tenantfirstname;
    }

    /**
     * @return mixed
     */
    public function getTenantlastname()
    {
        return $this->tenantlastname;
    }

    /**
     * @param mixed $tenantlastname
     */
    public function setTenantlastname($tenantlastname): void
    {
        $this->tenantlastname = $tenantlastname;
    }

    /**
     * @return mixed
     */
    public function getTenantemail()
    {
        return $this->tenantemail;
    }

    /**
     * @param mixed $tenantemail
     */
    public function setTenantemail($tenantemail): void
    {
        $this->tenantemail = $tenantemail;
    }

    /**
     * @return mixed
     */
    public function getTenantgender()
    {
        return $this->tenantgender;
    }

    /**
     * @param mixed $tenantgender
     */
    public function setTenantgender($tenantgender): void
    {
        $this->tenantgender = $tenantgender;
    }

    /**
     * @return mixed
     */
    public function getTenantbillingstreet()
    {
        return $this->tenantbillingstreet;
    }

    /**
     * @param mixed $tenantbillingstreet
     */
    public function setTenantbillingstreet($tenantbillingstreet): void
    {
        $this->tenantbillingstreet = $tenantbillingstreet;
    }

    /**
     * @return mixed
     */
    public function getTenantbillingcity()
    {
        return $this->tenantbillingcity;
    }

    /**
     * @param mixed $tenantbillingcity
     */
    public function setTenantbillingcity($tenantbillingcity): void
    {
        $this->tenantbillingcity = $tenantbillingcity;
    }

    private $tenantid;
    private $tenantfirstname;
    private $tenantlastname;
    private $tenantemail;
    private $tenantgender;
    private $tenantbillingstreet;
    private $tenantbillingcity;

}