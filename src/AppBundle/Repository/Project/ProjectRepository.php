<?php

namespace AppBundle\Repository\Project;

use CoreDomain\DTO\Project\SearchDTO;
use CoreDomain\Repository\Project\ProjectRepositoryInterface;

use CoreDomain\Model\Project\Project;

use Doctrine\ORM\EntityManagerInterface;


class ProjectRepository implements ProjectRepositoryInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param SearchDTO $searchDTO
     * @return array<Project>
     */
    public function search(SearchDTO $searchDTO)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Project::class, 'p');

        return $qb
            ->setMaxResults($searchDTO->limit)
            ->setFirstResult($searchDTO->offset)
            ->getQuery()
            ->getResult();
    }
}