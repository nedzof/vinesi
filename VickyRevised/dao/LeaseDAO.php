<?php

namespace dao;

use domain\Lease;
use Exception;
use PDO;

class LeaseDAO extends BasicDAO
{


    public function create(Lease $lease)
    {

        //sql> INSERT INTO "public"."leasetable" ("leaseid", "leasemonthlyrent", "leaseutilities", "leasepaymentmethod", "leasedeposit", "leasestart", "leaseend", "propertytable_propertyid", "tenttable_tenantid") VALUES (DEFAULT, 233, 393, 'PayPal', 1200, '2018-12-16 14:10:06.164000', '2018-12-16 14:10:08.954000', 4, 1)
        try {
            $sql = "INSERT INTO leasetable (leaseid, leasemonthlyrent, leaseutilities, leasepaymentmethod, leasedeposit, leasestart, leaseend, propertytable_propertyid, tenttable_tenantid) 
            VALUES (DEFAULT, :leasemonthlyrent, :leaseutilities, :leasepaymentmethod, :leasedeposit, :leasestart, :leaseend, :propertytable_propertyid, :tenttable_tenantid)";
            $stmt = $this->pdoInstance->prepare($sql);

        $stmt->bindValue(':leasemonthlyrent', $lease->getLeasemonthlyrent());
        $stmt->bindValue(':leaseutilities', $lease->getLeaseutilities());
        $stmt->bindValue(':leasepaymentmethod', $lease->getLeasepaymentmethod());
        $stmt->bindValue(':leasedeposit', $lease->getLeasedeposit());
            $stmt->bindValue(':leasestart', $lease->getLeaseendDate(true));
            $stmt->bindValue(':leaseend', $lease->getLeaseendDate(true));
        $stmt->bindValue(':propertytable_propertyid', $lease->getPropertytablePropertyid());
            $stmt->bindValue(':tenttable_tenantid', $lease->getTenttableTenantid());


            $stmt->execute();
        } catch (Exception $e) {
            $a = ($lease->getTenttableTenantid());
            echo "<script>alert(\"$a\")</script>";

            echo "<script>alert(\"FIX YOOO SHIT\")</script>";

            return false;
        }
        return true;

    }


    public function readById($leaseid)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM leasetable WHERE leaseid = :id;');
        $stmt->bindValue(':id', $leaseid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Lease::class)[0];
        }
        return null;
    }

    public function readAll()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM leasetable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, Lease::class);
            return $result;

        }
        return null;


    }

    public function update(Lease $lease)
    {

        try {
            $this->pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->pdoInstance->prepare('
                UPDATE leasetable SET 
                leasemonthlyrent = :leasemonthlyrent,
                leaseutilities = :leaseutilities,
                leasepaymentmethod = :leasepaymentmethod,
                leasedeposit = :leasedeposit,
                leasestart = :leasestart,
                leaseend = :leaseend,
                propertytable_propertyid = :propertytable_propertyid,
                tenttable_tenantid = :tenttable_tenantid
                WHERE leaseid = :id');
            $stmt->bindValue(':leasemonthlyrent', $lease->getLeasemonthlyrent());
            $stmt->bindValue(':leaseutilities', $lease->getLeaseutilities());
            $stmt->bindValue(':leasepaymentmethod', $lease->getLeasepaymentmethod());
            $stmt->bindValue(':leasedeposit', $lease->getLeasedeposit());
            $stmt->bindValue(':leasestart', $lease->getLeasestartDate(true));//->format('Y-m-d H:i:s.u'));
            $stmt->bindValue(':leaseend', $lease->getLeaseendDate(true));//->format('Y-m-d H:i:s.u'));
            $stmt->bindValue(':propertytable_propertyid', $lease->getPropertytablePropertyid());
            $stmt->bindValue(':tenttable_tenantid', $lease->getTenttableTenantid());
            $stmt->bindValue(':id', $lease->getLeaseid());
            $stmt->execute() or die("SQL Error in: " . $stmt->queryString . " - " . $stmt->errorInfo()[2]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function delete(Lease $lease)
    {
        $stmt = $this->pdoInstance->prepare('DELETE FROM leasetable WHERE leaseid = :id');
        $stmt->bindValue(':id', $lease->getLeaseid());
        $stmt->execute();
        return true;
    }


    public function getAllLeases()
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM leasetable ORDER BY leaseid;');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Lease::class);


    }

    public function getLeaseById($leaseID)
    {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM leasetable WHERE leaseid = :id LIMIT 1');
        $stmt->bindValue(':id', $leaseID);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Lease::class)[0];
            return $result;
        }
        return null;
    }
}

