<?php
/**
 * Created by PhpStorm.
 * User: nedzo
 * Date: 10.12.18
 * Time: 13:05
 */

namespace domain;

class User
{

    private $userid;
    private $userlastname;
    private $useremail;
    private $userhashedpassword;
    private $userstatus;

    /**
     * User constructor.
     * @param $userid
     * @param $userlastname
     * @param $useremail
     * @param $userhashedpassword
     * @param $userstatus
     */


    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return mixed
     */
    public function getUserlastname()
    {
        return $this->userlastname;
    }

    /**
     * @param mixed $userlastname
     */
    public function setUserlastname($userlastname): void
    {
        $this->userlastname = $userlastname;
    }

    /**
     * @return mixed
     */
    public function getUseremail()
    {
        return $this->useremail;
    }

    /**
     * @param mixed $useremail
     */
    public function setUseremail($useremail): void
    {
        $this->useremail = $useremail;
    }

    /**
     * @return mixed
     */
    public function getUserhashedpassword()
    {
        return $this->userhashedpassword;
    }

    /**
     * @param mixed $userhashedpassword
     */
    public function setUserhashedpassword($userhashedpassword): void
    {
        $this->userhashedpassword = $userhashedpassword;
    }

    /**
     * @return mixed
     */
    public function getUserstatus()
    {
        return $this->userstatus;
    }

    /**
     * @param mixed $userstatus
     */
    public function setUserstatus($userstatus): void
    {
        $this->userstatus = $userstatus;
    }


}