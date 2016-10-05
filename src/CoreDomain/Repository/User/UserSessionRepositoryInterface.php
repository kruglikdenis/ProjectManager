<?php

namespace CoreDomain\Repository\User;

use CoreDomain\Model\User\UserSession;

interface UserSessionRepositoryInterface
{
    public function findOneByToken($token);

    public function addAndSave(UserSession $session);
}