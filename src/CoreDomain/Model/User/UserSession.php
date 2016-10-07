<?php

namespace CoreDomain\Model\User;

use Rhumsaa\Uuid\Uuid;

class UserSession
{
    private $id;
    private $user;

    private $token;

    private $loginDate;
    private $logoutDate;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->token = $this->generateToken();
        $this->loginDate = new \DateTime();
    }

    public function finish()
    {
        if(!$this->logoutDate) {
            $this->logoutDate = new \DateTime();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getUserId()
    {
        return $this->user->getId();
    }

    private function generateToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(24));
    }
}
