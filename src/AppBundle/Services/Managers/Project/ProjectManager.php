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
     * @return array<Project>
     */
    public function search(SearchDTO $searchDTO)
    {
        return $this->projectRepository->search($searchDTO);
    }
}