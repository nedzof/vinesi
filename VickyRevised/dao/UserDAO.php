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
        $pdostatement = $this->pdoInstance->prepare('
            SELECT * FROM usertable WHERE userid = :id');
        $pdostatement->bindValue(':id', $userid);
        $pdostatement->execute();
        if ($pdostatement->rowCount() > 0) {
            $result = $pdostatement->fetchObject();
            return new User($result->userid, $result->userlastname, $result->useremail, $result->userhashedpassword, $result->userstatus);

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
        return $this->read($user->getUserid());
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
            $result = $pdostatement->fetchObject();
            $user = new User();
            $user->setUserid($result->userid);
            $user->setUserlastname($result->userlastname);
            $user->setUseremail($result->useremail);
            $user->setUserhashedpassword($result->userhashedpassword);
            $user->setUserstatus($result->userstatus);
            return $user;
        }
        return null;
    }

}

?>