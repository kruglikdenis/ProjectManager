<?php

namespace CoreDomain\Repository\Project;

use CoreDomain\DTO\Project\SearchTaskDTO;
use CoreDomain\Model\Project\Task;

interface TaskRepositoryInterface
{
    /**
     * @param SearchTaskDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Task>|integer
     */
    public function search(SearchTaskDTO $searchDTO, $isOnlyCount = false);

    public function findOneById($id);
    public function deleteById($id);
    public function addAndSave(Task $task);
}