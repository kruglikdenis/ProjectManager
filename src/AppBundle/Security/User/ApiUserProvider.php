<?php

namespace AppBundle\Security\User;

use CoreDomain\Model\User\User;
use CoreDomain\Repository\User\UserSessionRepositoryInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use CoreDomain\Repository\User\UserRepositoryInterface;

class ApiUserProvider implements UserProviderInterface
{
    private $userRepository;
    private $userSessionRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserSessionRepositoryInterface $userSessionRepository
    ) {
        $this->userRepository = $userRepository;
        $this->userSessionRepository = $userSessionRepository;
    }


    public function loadUserByUsername($email)
    {
        if ($user = $this->userRepository->findOneByEmail($email)) {
            return $user;
        }

        throw new AuthenticationException('User was not found');
    }

    public function loadUserByToken($token)
    {
        if ($userSession = $this->userSessionRepository->findOneByToken($token)) {
            $user = $userSession->getUser();
            $user->setSession($userSession);
            return $user;
        }
        throw new AuthenticationException('User was not found');
    }

    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return $class === User::class;
    }
}