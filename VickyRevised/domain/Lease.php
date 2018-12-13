<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 10.12.18
 * Time: 12:19
 */

namespace domain;

use http\HTTPException;
use service\TenantServiceImpl;

class Lease
{

    protected $leaseid;
    private $leasemonthylrent;
    private $leaseutilities;
    private $leasepaymentmethod;
    private $leasedeposit;
    private $leasestart;
    private $leaseend;
    private $propertytable_propertyid;
    private $tenttable_tenantid;


    /**
     * @return mixed
     */
    public function getLeaseid()
    {
        return $this->leaseid;
    }

    /**
     * @param mixed $leaseid
     */
    public function setLeaseid($leaseid): void
    {
        $this->leaseid = $leaseid;
    }

    /**
     * @return mixed
     */
    public function getLeasemonthylrent()
    {
        return $this->leasemonthylrent;
    }

    /**
     * @param mixed $leasemonthylrent
     */
    public function setLeasemonthylrent($leasemonthylrent): void
    {
        $this->leasemonthylrent = $leasemonthylrent;
    }

    /**
     * @return mixed
     */
    public function getLeaseutilities()
    {
        return $this->leaseutilities;
    }

    /**
     * @param mixed $leaseutilities
     */
    public function setLeaseutilities($leaseutilities): void
    {
        $this->leaseutilities = $leaseutilities;
    }

    /**
     * @return mixed
     */
    public function getLeasepaymentmethod()
    {
        return $this->leasepaymentmethod;
    }

    /**
     * @param mixed $leasepaymentmethod
     */
    public function setLeasepaymentmethod($leasepaymentmethod): void
    {
        $this->leasepaymentmethod = $leasepaymentmethod;
    }

    /**
     * @return mixed
     */
    public function getLeasedeposit()
    {
        return $this->leasedeposit;
    }

    /**
     * @param mixed $leasedeposit
     */
    public function setLeasedeposit($leasedeposit): void
    {
        $this->leasedeposit = $leasedeposit;
    }

    /**
     * @return mixed
     */
    public function getLeasestart()
    {
        return $this->leasestart;
    }

    /**
     * @param mixed $leasestart
     */
    public function setLeasestart($leasestart): void
    {
        $this->leasestart = $leasestart;
    }

    /**
     * @return mixed
     */
    public function getLeaseend()
    {
        return $this->leaseend;
    }

    /**
     * @param mixed $leaseend
     */
    public function setLeaseend($leaseend): void
    {
        $this->leaseend = $leaseend;
    }

    /**
     * @return mixed
     */
    public function getPropertytablePropertyid()
    {
        return $this->propertytable_propertyid;
    }

    /**
     * @param mixed $propertytable_propertyid
     */
    public function setPropertytablePropertyid($propertytable_propertyid): void
    {
        $this->propertytable_propertyid = $propertytable_propertyid;
    }

    /**
     * @return mixed
     */
    public function getTenttableTenantid()
    {
        return $this->tenttable_tenantid;
    }

    /**
     * @param mixed $tenttable_tenantid
     */
    public function setTenttableTenantid($tenttable_tenantid): void
    {
        $this->tenttable_tenantid = $tenttable_tenantid;
    }

    public function getTenant($tid)
    {
        try {
            $tenantLastName = (new TenantServiceImpl())->getTenantlastnameById($tid);
            return $tenantLastName;
        } catch (HTTPException $e) {
        }

    }


}


