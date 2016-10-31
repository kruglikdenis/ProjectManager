<?php

namespace CoreDomain\Model\Project;

class Project
{
    private $id;

    private $title;
    private $description;
    private $code;

    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    private $isDeleted;

    public function __construct()
    {
        $this->createdAt = (new \DateTime())->getTimestamp();
        $this->isDeleted = false;
    }
}