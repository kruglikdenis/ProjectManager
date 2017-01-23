<?php

namespace AppBundle\Services\Managers\Project;

use CoreDomain\DTO\Project\SearchTaskDTO;
use CoreDomain\DTO\Project\TaskDTO;
use CoreDomain\Model\Project\Task;
use CoreDomain\Repository\Project\TaskRepositoryInterface;

use Doctrine\ORM\EntityManagerInterface;

class TaskManager
{
    private $em;
    private $taskRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->em = $entityManager;
    }

    /**
     * @param SearchTaskDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Task>|integer
     */
    public function search(SearchTaskDTO $searchDTO, $isOnlyCount = false)
    {
        return $this->taskRepository->search($searchDTO, $isOnlyCount);
    }

    public function addTask(TaskDTO $taskDTO)
    {
        $this->em->beginTransaction();
        try {

            $task = new Task();

            $task->updateInfo(
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getCode(),
                $taskDTO->getResolution(),
                $taskDTO->getEstimate()
            );
            $this->taskRepository->addAndSave($task);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
        return $task;
    }

    public function updateTask(TaskDTO $taskDTO, $id)
    {
        $this->em->beginTransaction();
        try {

            $task = $this->taskRepository->findOneById($id);
            if(!$task) {
                throw new \Exception("Проект не существует");
            }

            $task->updateInfo(
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getCode(),
                $taskDTO->getResolution(),
                $taskDTO->getEstimate()
            );
            $this->taskRepository->addAndSave($task);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
        return $task;
    }

    public function getTaskById($id) {
        return $this->taskRepository->findOneById($id);
    }

}