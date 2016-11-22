<?php

namespace AppBundle\Controller\Project;

use CoreDomain\DTO\Project\SearchDTO;

use CoreDomain\Exception\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ProjectController extends Controller
{
    /**
     * @Rest\Get("/projects")
     * @Rest\View(serializerGroups="api_project_get", statusCode=200)
     * @ParamConverter(
     *      "searchDTO",
     *      converter="fos_rest.request_body",
     *      options={
     *          "deserializationContext"={"groups"="api_project_search"},
     *          "validator"={"groups"={"api_project_search"}}
     *      }
     * )
     */
    public function listAction(SearchDTO $searchDTO, ConstraintViolationListInterface $validationErrors)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.project.project')->search($searchDTO);
    }
}