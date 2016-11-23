<?php

namespace CoreDomain\Repository\Project;

use CoreDomain\DTO\Project\SearchDTO;
use CoreDomain\Model\Project\Project;

interface ProjectRepositoryInterface
{
    /**
     * @param SearchDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Project>|integer
     */
    public function search(SearchDTO $searchDTO, $isOnlyCount = false);

    public function findOneById($id);
    public function deleteById($id);
    public function addAndSave(Project $project);
}