<?php

namespace CoreDomain\Repository\Project;

use CoreDomain\DTO\Project\SearchDTO;

interface ProjectRepositoryInterface
{
    /**
     * @param SearchDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Project>|integer
     */
    public function search(SearchDTO $searchDTO, $isOnlyCount = false);
}