<?php

namespace AppBundle\Repository\Project;

use CoreDomain\DTO\Project\SearchTaskDTO;
use CoreDomain\Repository\Project\TaskRepositoryInterface;
use CoreDomain\Model\Project\Task;

use Doctrine\ORM\EntityManagerInterface;


class TaskRepository implements TaskRepositoryInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findOneById($id)
    {
        $result = $this->em->createQueryBuilder()
            ->select('t')
            ->from(Task::class, 't')
            ->where('t.id = :id')
            ->andWhere('t.isDeleted = :isDeleted')
            ->setParameters(array(
                'id' => $id,
                'isDeleted' => false
            ))
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    public function addAndSave(Task $task)
    {
        $this->em->persist($task);
        $this->em->flush();
    }

    public function deleteById($id)
    {
        $this->em->createQueryBuilder()
            ->update(Task::class, 't')
            ->set('t.isDeleted', ':isDeleted')
            ->where('t.id = :id')
            ->setParameters(array(
                'isDeleted' => true,
                'id' => $id
            ))
            ->getQuery()
            ->execute();
    }

    /**
     * @param SearchTaskDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Task>|integer
     */
    public function search(SearchTaskDTO $searchDTO, $isOnlyCount = false)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('t')
            ->from(Task::class, 'p')
            ->where('t.isDeleted = :isDeleted')
            ->setParameter('isDeleted', false);

        if ($searchDTO->title) {
            $qb->andWhere(
                $qb->expr()->like(
                    $qb->expr()->lower('t.title'),
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