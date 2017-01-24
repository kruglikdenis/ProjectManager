<?php

namespace CoreDomain\Model\Project;

class Project
{
    private $id;

    private $title;
    private $description;
    private $code;
    private $tasks;

    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    private $isDeleted;

    public function __construct()
    {
        $this->createdAt = (new \DateTime())->getTimestamp();
        $this->isDeleted = false;
    }

    public function updateInfo($title, $description, $code) {
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;

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

    public function getTasks()
    {
        return $this->tasks;
    }


}