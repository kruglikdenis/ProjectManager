<?php

namespace AppBundle\Services\Managers\Project;

use CoreDomain\DTO\Project\SearchDTO;
use CoreDomain\DTO\Project\ProjectDTO;
use CoreDomain\Model\Project;
use CoreDomain\Repository\Project\ProjectRepositoryInterface;

use Doctrine\ORM\EntityManagerInterface;

class ProjectManager
{
    private $em;
    private $projectRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->em = $entityManager;
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

    public function addProject(ProjectDTO $projectDTO)
    {
        $this->em->beginTransaction();
        try {

            $project = new Project\Project();

            $project->updateInfo(
                $projectDTO->getTitle(),
                $projectDTO->getDescription(),
                $projectDTO->getCode()
            );
            $this->projectRepository->addAndSave($project);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
        return $project;
    }

    public function updateProject(ProjectDTO $projectDTO, $id)
    {
        $this->em->beginTransaction();
        try {

            $project = $this->projectRepository->findOneById($id);
            if(!$project) {
                throw new \Exception("Проект не существует");
            }

            $project->updateInfo(
                $projectDTO->getTitle(),
                $projectDTO->getDescription(),
                $projectDTO->getCode()
            );
            $this->projectRepository->addAndSave($project);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
            throw $e;
        }
        return $project;
    }

    public function getProjectById($id) {
        return $this->projectRepository->findOneById($id);
    }

}