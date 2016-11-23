<?php

namespace AppBundle\Controller\Project;

use CoreDomain\DTO\Project\SearchDTO;
use CoreDomain\DTO\Project\ProjectDTO;

use CoreDomain\Exception\ValidationException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProjectController extends Controller
{
    /**
     * @Rest\Get("/projects")
     */
    public function listAction(Request $request)
    {
        $searchDTO = $this->get('jms_serializer')->deserialize(
            json_encode($request->query->all()),
            SearchDTO::class,
            'json',
            DeserializationContext::create()->setGroups(['api_project_search'])
        );

        $projectManager = $this->get('app.managers.project.project');
        $projects =  $projectManager->search($searchDTO);

        $content = $this->get('serializer')->serialize(
            $projects,
            'json',
            SerializationContext::create()->setGroups('api_project_search')
        );

        $response = new Response($content);
        $response->headers->set('X-Total-Count', $projectManager->search($searchDTO, true));

        return $response;
    }

    /**
     * @Rest\Post("/projects")
     * @Rest\View(serializerGroups="api_project_get", statusCode=201)
     * @ParamConverter(
     *      "projectDTO",
     *      converter="fos_rest.request_body",
     *      options={
     *          "deserializationContext"={"groups"="api_project_create"},
     *          "validator"={"groups"={"api_project_create"}}
     *      }
     * )
     */
    public function createAction(ProjectDTO $projectDTO, ConstraintViolationListInterface $validationErrors)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.project.project')->addProject($projectDTO);
    }

    /**
     * @Rest\Patch("/projects/{id}")
     * @Rest\View(serializerGroups={"api_project_get"}, statusCode=201)
     * @ParamConverter(
     *     "projectDTO",
     *     converter="fos_rest.request_body",
     *     options={
     *          "deserializationContext"={"groups"="api_project_update"},
     *          "validator"={"groups"={"api_project_update"}}
     *     }
     * )
     */
    public function updateAction(ProjectDTO $projectDTO, ConstraintViolationListInterface $validationErrors, $id)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.project.project')->updateProject($projectDTO, $id);
    }

    /**
     * @Rest\GET("/projects/{id}")
     * @Rest\View(serializerGroups={"api_project_get"}, statusCode=200)
     */
    public function viewAction($id)
    {
        return $this->get('app.manager.project.project')->getProjectById($id);
    }

    /**
     * @Rest\Delete("/projects/{id}")
     */
    public function deleteAction($id)
    {
        return $this->get('app.manager.project.project')->deleteProjectById($id);
    }
}