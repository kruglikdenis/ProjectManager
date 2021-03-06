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

    public function findOneById($id)
    {
        $result = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Project::class, 'p')
            ->where('p.id = :id')
            ->andWhere('p.isDeleted = :isDeleted')
            ->setParameters(array(
                'id' => $id,
                'isDeleted' => false
            ))
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    public function addAndSave(Project $project)
    {
        $this->em->persist($project);
        $this->em->flush();
    }

    public function deleteById($id)
    {
        $this->em->createQueryBuilder()
            ->update(Project::class, 'p')
            ->set('p.isDeleted', ':isDeleted')
            ->where('p.id = :id')
            ->setParameters(array(
                'isDeleted' => true,
                'id' => $id
            ))
            ->getQuery()
            ->execute();
    }

    /**
     * @param SearchDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Project>|integer
     */
    public function search(SearchDTO $searchDTO, $isOnlyCount = false)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Project::class, 'p')
            ->where('p.isDeleted = :isDeleted')
            ->setParameter('isDeleted', false);

        if ($searchDTO->title) {
            $qb->andWhere(
                $qb->expr()->like(
                    $qb->expr()->lower('p.title'),
                    $qb->expr()->lower(':name')
                )
            )->setParameter('name', "%$searchDTO->title%");
        }

        if ($isOnlyCount) {
            return $qb->select('COUNT(p.id)')
                ->getQuery()
                ->getSingleScalarResult();
        }

        return $qb
            ->setMaxResults($searchDTO->limit)
            ->setFirstResult($searchDTO->offset)
            ->getQuery()
            ->getResult();
    }
}