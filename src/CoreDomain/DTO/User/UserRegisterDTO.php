<?php

namespace CoreDomain\DTO\User;

class UserRegisterDTO
{
    private $email;
    private $password;
    private $roles = [];

    public function __construct($email, $password, array $roles = [])
    {
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}
