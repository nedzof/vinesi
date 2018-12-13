<?php

namespace dao;

use domain\Property;

class PropertyDAO extends BasicDAO {


    public function create(Property $property) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO propertytable (propertyid, propertyrooms) VALUES (DEFAULT, :propertyrooms)');

        $stmt->bindValue(':propertyrooms', $property->getPropertyRooms());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }


    public function read($propertyid) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM tenanttable WHERE id = :id;');
        $stmt->bindValue(':id', $propertyid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Property")[0];
        }
        return null;
    }

    public function readAll() {
        $stmt = $this->pdoInstance->prepare('SELECT * FROM tenanttable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Property");
        }
        return null;
    }

    public function update(Property $property) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE propertytable SET 
            propertyrooms = :propertyrooms;
            WHERE id = :id');
        $stmt->bindValue(':propertyid', $property->getPropertyid());
        $stmt->bindValue(':propertyrooms', $property->getPropertyRooms());
        $stmt->execute();
        return $this->read($property->getPropertyid());
    }


    public function delete(Property $property) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM propertytable
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $property->getPropertyid());
        $stmt->execute();
    }

}
?>