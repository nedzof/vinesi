<?php

namespace dao;

use domain\Lease;

class LeaseDAO extends BasicDAO {


    public function create(Lease $lease) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO leasetable (leaseid, leasemonthlyrent, leaseutilities, leasepaymentmethod, leasedeposit, leasestart, leaseend, propertytable_propertyid, tenttable_tenantid) VALUES );
           :leaseid, :leasemonthlyrent, :leaseutilities, :leasepaymentmethod, :leasedeposit, :leasestart, :leaseend, :propertytable_propertyid, :tenttable_tenantid');
        $stmt->bindValue(':leaseid', $lease->getLeaseid());
        $stmt->bindValue(':leasemonthlyrent', $lease->getLeasemonthylrent());
        $stmt->bindValue(':leaseutilities', $lease->getLeaseutilities());
        $stmt->bindValue(':leasepaymentmethod', $lease->getLeasepaymentmethod());
        $stmt->bindValue(':leasedeposit', $lease->getLeasedeposit());
        $stmt->bindValue(':leasestart', $lease->getLeasestart());
        $stmt->bindValue(':leaseend', $lease->getLeaseend());
        $stmt->bindValue(':propertytable_propertyid', $lease->getPropertytablePropertyid());
        $stmt->bindValue(':tenttable_tenantid', $lease->getTenttableTenantid());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }


    public function read($leaseid) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM leasetable WHERE id = :id;');
        $stmt->bindValue(':id', $leaseid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Lease")[0];
        }
        return null;
    }

    public function readAll() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM leasetable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Lease");
        }
        return null;
    }

    public function update(Lease $lease) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE leasetable SET 
            leaseid = :leaseid,
            leasemonthlyrent = :leasemonthlyrent,
            leaseutilities = :leaseutilities,
            leasepaymentmethod = :leasepaymentmethod,
            leasedeposit = :leasedeposit,
            leasestart = :leasestart,
            leaseend = :leaseend,
            propertytable_propertyid = :propertytable_propertyid,
            tenttable_tenantid = :tenttable_tenantid,
            WHERE id = :id');
        $stmt->bindValue(':leasemonthlyrent', $lease->getLeasemonthylrent());
        $stmt->bindValue(':leaseutilities', $lease->getLeaseutilities());
        $stmt->bindValue(':leasepaymentmethod', $lease->getLeasepaymentmethod());
        $stmt->bindValue(':leasedeposit', $lease->getLeasedeposit());
        $stmt->bindValue(':leasestart', $lease->getLeasestart());
        $stmt->bindValue(':leaseend', $lease->getLeaseend());
        $stmt->bindValue(':propertytable_propertyid', $lease->getPropertytablePropertyid());
        $stmt->bindValue(':tenttable_tenantid', $lease->getTenttableTenantid());


        $stmt->execute();
        return $this->read($lease->getLeaseid());
    }


    public function delete(Lease $lease) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM leasetable
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $lease->getLeaseid());
        $stmt->execute();
    }

}
?>