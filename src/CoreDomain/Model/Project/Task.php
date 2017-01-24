<?php

namespace CoreDomain\Model\Project;

class Task
{
    private $id;

    private $title;
    private $description;
    private $code;
    private $project;

    private $estimate;
    private $resolution;

    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    private $isDeleted;

    public function __construct()
    {
        $this->createdAt = (new \DateTime())->getTimestamp();
        $this->isDeleted = false;
    }

    public function updateInfo($title, $description, $code, $resolution, $estimate, Project $project) {
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;
        $this->resolution = $resolution;
        $this->estimate = $estimate;
        $this->project = $project;

        $this->updatedAt = (new \DateTime())->getTimestamp();
    }

    public function setIsDeleted($isDeleted)
    {
        $this->deletedAt = (new \DateTime())->getTimestamp();
        $this->isDeleted = $isDeleted;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function isIsDeleted()
    {
        return $this->isDeleted;
    }

    public function getEstimate()
    {
        return $this->estimate;
    }

    public function getResolution()
    {
        return $this->resolution;
    }

}