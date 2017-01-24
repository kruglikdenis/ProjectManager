<?php

namespace CoreDomain\DTO\Project;

class TaskDTO
{
    private $title;
    private $description;
    private $code;
    private $resolution;
    private $estimate;
    private $project;

    public function __construct($title, $description, $code, $resolution, $estimate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;
        $this->estimate = $estimate;
        $this->resolution = $resolution;
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

    public function getResolution()
    {
        return $this->resolution;
    }

    public function getEstimate()
    {
        return $this->estimate;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function setProject($project)
    {
        $this->project = $project;
    }




}
