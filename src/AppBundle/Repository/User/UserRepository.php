<?php

namespace AppBundle\Repository\User;

use CoreDomain\DTO\User\SearchDTO;
use CoreDomain\Model\User\UserEmployer;
use CoreDomain\Model\User\UserTeacher;
use Doctrine\ORM\EntityManagerInterface;
use CoreDomain\Repository\User\UserRepositoryInterface;
use CoreDomain\Model\User\User;

class UserRepository implements UserRepositoryInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findOneByEmail($email)
    {
        return $this->em->createQueryBuilder()
            ->select('u')
            ->from(User::class, 'u')
            ->where('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneById($id)
    {
        $result = $this->em->createQueryBuilder()
            ->select('u')
            ->from(User::class, 'u')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    public function findOneByToken($token, $expirePeriod = 'P7D')
    {
        $validCreatedAt = new \DateTime();
        $validCreatedAt->sub(new \DateInterval($expirePeriod));

        return $this->em->createQueryBuilder()
            ->select('u')
            ->from(User::class, 'u')
            ->innerJoin('u.sessions', 's')
            ->where('s.token = :token')
            ->andWhere('s.createdAt > :date')
            ->setParameter('token', $token)
            ->setParameter('date', $validCreatedAt)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function search(SearchDTO $searchDTO, $onlyCount = false)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u')
            ->from(User::class, 'u');

        // ôèëüòğóåì ïî ÔÈÎ
        if ($searchDTO->name) {
            $qb
                ->orWhere($qb->expr()->like(
                    $qb->expr()->lower('u.lastName'),
                    $qb->expr()->lower(':searchStr')
                ))
                ->orWhere($qb->expr()->like(
                    $qb->expr()->lower('u.firstName'),
                    $qb->expr()->lower(':searchStr')
                ))
                ->orWhere($qb->expr()->like(
                    $qb->expr()->lower('u.middleName'),
                    $qb->expr()->lower(':searchStr')
                ))
                ->setParameter('searchStr', '%' . trim($searchDTO->name) . '%');
        }

        if ($onlyCount) {
            return $qb
                ->select('COUNT(u.id)')
                ->getQuery()
                ->getSingleScalarResult();
        } else {
            $qb
                ->addOrderBy('u.lastName', 'ASC')
                ->addOrderBy('u.firstName', 'ASC')
                ->addOrderBy('u.middleName', 'ASC')
                ->addOrderBy('u.id');

            return $qb
                ->setMaxResults($searchDTO->limit)
                ->setFirstResult($searchDTO->offset)
                ->getQuery()
                ->getResult();
        }
    }


    public function add(User $user)
    {
        $this->em->persist($user);
    }

    public function addAndSave(User $user)
    {
        $this->em->persist($user);
        $this->em->flush($user);
    }
}
