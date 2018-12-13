<?php

namespace dao;

use domain\Tenant;

class TenantDAO extends BasicDAO {


    public function create(Tenant $tenant) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO tenanttable (tenantid, tenantfirstname, tenantlastname, tenantemail, tenantgender, tenantbillingstreet, tenantbillingcity)
            VALUES (DEFAULT, :tenantfirstname, :tenantemail, :tenantlastname, :tenantgender, :tenantbillingstreet, :tenantbillingcity)');
        $stmt->bindValue(':tenantfirstname', $tenant->getTenantFirstName());
        $stmt->bindValue(':tenantlastname', $tenant->getTenantLastName());
        $stmt->bindValue(':tenantemail', $tenant->getTenantEmail());
        $stmt->bindValue(':tenantgender', $tenant->getTenantGender());
        $stmt->bindValue(':tenantbillingstreet', $tenant->getTenantBillingStreet());
        $stmt->bindValue(':tenantbillingcity', $tenant->getTenantBillingCity());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }


    public function readTenantById($tenantid)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM tenanttable WHERE id = :id;');
        $stmt->bindValue(':id', $tenantid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Tenant")[0];
        }
        return null;
    }

    public function readAll() {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM tenanttable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Tenant");
        }
        return null;
    }

    public function update(Tenant $tenant) {

    }


    public function delete(Tenant $tenant) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM tenanttable
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $tenant->getTenantid());
        $stmt->execute();
    }

    function getTenantLastNameById($id)
    {

        $sql = "SELECT tenantlastname FROM tenanttable WHERE tenantid = :id LIMIT 1";
        $stmt = $this->pdoInstance->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS, Tenant::class)[0];

            return $result->getTenantlastname();
        }
        return null;

    }
}
?>