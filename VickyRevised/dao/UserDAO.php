<?php

namespace dao;

use domain\User;

class UserDAO extends BasicDAO
{


    public function create(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO usertable(userid, userlastname, useremail, userhashedpassword, userstatus) 
            VALUES (DEFAULT, :userlastname, :useremail, :userhashedpassword, :userstatus');
        $stmt->bindValue(':userlastname', $user->getUserlastname());
        $stmt->bindValue(':useremail', $user->getUseremail());
        $stmt->bindValue(':userhashedpassword', $user->getUserhashedpassword());
        $stmt->bindValue(':userstatus', $user->getUserstatus());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }


    public function read($userid)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM usertable WHERE id = :id;');
        $stmt->bindValue(':id', $userid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_CLASS, "domain\User")[0];
        }
        return null;
    }

    public function readAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM usertable');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\User");
        }
        return null;
    }

    public function update(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            UPDATE usertable SET 
            userlastname = :userlastname,
            useremail = :useremail,
            userhashedpassword = :userhashedpassword,
            userstatus = :userstatus
            WHERE id = :id');
        $stmt->bindValue(':userlastname', $user->getUserlastname());
        $stmt->bindValue(':useremail', $user->getUseremail());
        $stmt->bindValue(':userhashedpassword', $user->getUserhashedpassword());
        $stmt->bindValue(':userstatus', $user->getUserstatus());
        $stmt->execute();
        return $this->read($user->getUserstatus());
    }


    public function delete(User $user)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM usertable
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $user->getUserid());
        $stmt->execute();
    }

    public function findByEmail($email)
    {
        $pdostatement = $this->pdoInstance->prepare('SELECT * FROM usertable WHERE useremail = :email');
        $pdostatement->bindValue(':email', $email);
        $pdostatement->execute();
        if ($pdostatement->rowCount() > 0) {
            return $result = $pdostatement->fetchObject();
        }
        return false;
    }

}

?>