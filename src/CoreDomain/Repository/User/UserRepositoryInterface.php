<?php

namespace CoreDomain\Repository\User;

use CoreDomain\Model\User\User;

interface UserRepositoryInterface
{
    public function findOneByEmail($email);
    public function findOneById($id);
    public function findOneByToken($token);

    public function add(User $user);
    public function addAndSave(User $user);
}
