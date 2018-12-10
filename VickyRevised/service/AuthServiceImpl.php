<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 08.10.2017
 * Time: 14:39
 */

namespace service;

use dao\UserDAO;
use domain\User;
use http\HTTPException;
use http\HTTPStatusCode;


class AuthServiceImpl implements AuthService {

    private static $instance = null;

    private $currentUserId;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() { }

    private function __clone() { }

    public function verifyAuth() {
        if (isset($this->currentUserId))
            return true;
        return false;
    }

    public function getCurrentUserId()
    {
        return $this->currentUserId;
    }

    public function verifyUser($email, $password)
    {
        $userDAO = new UserDAO();
        $user = $userDAO->findByEmail($email);
        if (isset($user)) {
            if (password_verify($password, $user->getUserhashedpassword())) {
                if (password_needs_rehash($user->getUserhashedpassword(), PASSWORD_DEFAULT)) {
                    $user->setUserhashedpassword(password_hash($password, PASSWORD_DEFAULT));
                    $userDAO->update($user);
                }
                $this->currentAgentId = $user->getUserid();
                return true;
            }
        }
        return false;
    }

    public function readUser()
    {
        if($this->verifyAuth()) {
            $userDAO = new UserDAO();
            return $userDAO->read($this->currentUserId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
    }

    public function editUser($name, $email, $password)
    {
        $user = new User();
        $user->setUserlastname($name);
        $user->setUseremail($email);
        $user->setUserhashedpassword(password_hash($password, PASSWORD_DEFAULT));
        $userDAO = new UserDAO();
        if ($this->verifyAuth()) {
            //$user->setId($this->currentUserId);
            if ($userDAO->read($this->currentUserId)->getEmail() !== $user->getEmail()) {
                if (!is_null($userDAO->findByEmail($email))) {
                    return false;
                }
            }
            $userDAO->update($user);
            return true;
        }else{
            if (!is_null($userDAO->findByEmail($email))) {
                return false;
            }
            $userDAO->create($user);
            return true;
        }
    }

    public function validateToken($token) {
        $tokenArray = explode(":", $token);
        if(count($tokenArray)>1) {
            $this->currentUserId = $tokenArray[0];
            return true;
        }
        return false;
    }


    public function issueToken($type = self::AGENT_TOKEN, $email = null) {
        return $this->currentUserId . ":" . bin2hex(random_bytes(20));
    }
}