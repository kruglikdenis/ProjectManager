<?php

namespace AppBundle\Services\Managers\User;

use CoreDomain\DTO\User\SearchDTO;
use CoreDomain\DTO\User\UserRegisterDTO;
use CoreDomain\Exception\EntityNotFoundException;
use CoreDomain\Exception\LogicException;
use CoreDomain\Exception\ValidationException;
use CoreDomain\Model\User\Password;
use CoreDomain\Model\User\User;
use CoreDomain\Repository\User\UserRepositoryInterface;
use CoreDomain\Repository\User\UserSessionRepositoryInterface;
use CoreDomain\Security\PasswordStrategyInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\RecursiveValidator;

class UserManager
{
    private $em;
    private $userRepository;
    private $userSessionRepository;
    private $passwordEncoder;
    private $validator;

    public function __construct(
        EntityManagerInterface $em,
        UserRepositoryInterface $userRepository,
        UserSessionRepositoryInterface $userSessionRepository,
        PasswordStrategyInterface $passwordEncoder,
        RecursiveValidator $validator
    )
    {
        $this->em = $em;
        $this->userRepository = $userRepository;
        $this->userSessionRepository = $userSessionRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->validator = $validator;
    }

    public function register(UserRegisterDTO $userDTO)
    {
        $user = new User($userDTO->getEmail(), new Password($this->passwordEncoder, $userDTO->getPassword()), $userDTO->getRoles());

        if(count($validationErrors = $this->validator->validate($user)) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }
        $this->userRepository->addAndSave($user);
        return $user;
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->findOneByEmail($email);

        if(!$user || !$this->passwordEncoder->isPasswordValid($password, $user->getPassword(), $user->getSalt())) {
            throw new EntityNotFoundException('Incorrenct email or password.');
        }

        $userSession = $user->login();
        $this->userSessionRepository->addAndSave($userSession);

        return $userSession;
    }

    public function logout(User $user)
    {
        $user->logout();
        $this->userSessionRepository->addAndSave($user->getSession());
    }

    public function searchUser(SearchDTO $searchDTO, $isOnlyCount = false)
    {
        return $this->userRepository->search($searchDTO, $isOnlyCount);
    }
}