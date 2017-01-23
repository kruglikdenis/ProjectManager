<?php

namespace CoreDomain\DTO\Project;

class ProjectDTO
{
    private $title;
    private $description;
    private $code;

    public function __construct($title, $description, $code)
    {
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;
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

}
