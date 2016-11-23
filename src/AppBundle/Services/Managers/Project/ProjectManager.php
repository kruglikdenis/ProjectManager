<?php

namespace AppBundle\Services\Managers\Project;

use CoreDomain\DTO\Project\SearchDTO;

use CoreDomain\Repository\Project\ProjectRepositoryInterface;

class ProjectManager
{
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param SearchDTO $searchDTO
     * @param bool $isOnlyCount
     * @return array<Project>|integer
     */
    public function search(SearchDTO $searchDTO, $isOnlyCount = false)
    {
        return $this->projectRepository->search($searchDTO, $isOnlyCount);
    }
}