<?php

namespace CoreDomain\Exception;

class ValidationException extends DomainException
{
    private $errors;

    public function __construct($message, \Traversable $errors)
    {
        parent::__construct($message, 400);
        $this->errors = $errors;
    }

    public function getErrors()
    {
        $errors = [];
        foreach ($this->errors as $error) {
            $errors[$error->getPropertyPath()] = $error->getMessage();
        }
        return $errors;
    }
}
