<?php

namespace AppBundle\Services\Managers\Project;

use CoreDomain\DTO\Project\SearchTaskDTO;
use CoreDomain\DTO\Project\TaskDTO;
use CoreDomain\Model\Project\Task;
use CoreDomain\Repository\Project\TaskRepositoryInterface;
use CoreDomain\Repository\Project\ProjectRepositoryInterface;

use Doctrine\ORM\EntityManagerInterface;

class TaskManager
{
    private $em;
    private $taskRepository;
    private $projectRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                TaskRepositoryInterface $taskRepository,
                                ProjectRepositoryInterface $projectRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;

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
            $project = $this->projectRepository->findOneById($taskDTO->getProject());
            if(!$project) {
                throw new \Exception('Project not found');
            }

            $task = new Task();

            $task->updateInfo(
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getCode(),
                $taskDTO->getResolution(),
                $taskDTO->getEstimate(),
                $project
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

            $project = $this->projectRepository->findOneById($taskDTO->getProject());
            if(!$project) {
                throw new \Exception('Project not found');
            }

            $task = $this->taskRepository->findOneById($id);
            if(!$task) {
                throw new \Exception("Task not found");
            }

            $task->updateInfo(
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getCode(),
                $taskDTO->getResolution(),
                $taskDTO->getEstimate(),
                $project
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