<?php

namespace CoreDomain\Repository\Project;

use CoreDomain\DTO\Project\SearchDTO;

interface ProjectRepositoryInterface
{
    /**
     * @param SearchDTO $searchDTO
     * @return array<Project>
     */
    public function search(SearchDTO $searchDTO);
}