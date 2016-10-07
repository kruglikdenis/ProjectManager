<?php

namespace AppBundle\Repository\User;

use Doctrine\ORM\EntityManagerInterface;
use CoreDomain\Model\User\UserSession;
use CoreDomain\Repository\User\UserSessionRepositoryInterface;

class UserSessionRepository implements UserSessionRepositoryInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findOneByToken($token)
    {
        return $this->em->createQueryBuilder()
            ->select('us', 'u')
            ->from(UserSession::class, 'us')
            ->innerJoin('us.user', 'u')
            ->where('us.token = :token')
            ->setParameter('token', $token)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function addAndSave(UserSession $session)
    {
        $this->em->persist($session);
        $this->em->flush($session);
    }
}
