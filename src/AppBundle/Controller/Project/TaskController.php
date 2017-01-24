<?php

namespace AppBundle\Controller\Project;

use CoreDomain\DTO\Project\SearchTaskDTO;
use CoreDomain\DTO\Project\TaskDTO;

use CoreDomain\Exception\ValidationException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class TaskController extends Controller
{
    /**
     * @Rest\Get("/tasks")
     */
    public function listAction(Request $request)
    {
        $searchDTO = $this->get('jms_serializer')->deserialize(
            json_encode($request->query->all()),
            SearchTaskDTO::class,
            'json',
            DeserializationContext::create()->setGroups(['api_task_search'])
        );

        $taskManager = $this->get('app.managers.project.task');
        $tasks =  $taskManager->search($searchDTO);

        $content = $this->get('serializer')->serialize(
            $tasks,
            'json',
            SerializationContext::create()->setGroups('api_task_search')
        );

        $response = new Response($content);
        $response->headers->set('X-Total-Count', $taskManager->search($searchDTO, true));

        return $response;
    }

    /**
     * @Rest\Post("/tasks")
     * @Rest\View(serializerGroups="api_task_get", statusCode=201)
     * @ParamConverter(
     *      "taskDTO",
     *      converter="fos_rest.request_body",
     *      options={
     *          "deserializationContext"={"groups"="api_task_create"},
     *          "validator"={"groups"={"api_task_create"}}
     *      }
     * )
     */
    public function createAction(TaskDTO $taskDTO, ConstraintViolationListInterface $validationErrors)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.project.task')->addTask($taskDTO);
    }

    /**
     * @Rest\Patch("/tasks/{id}")
     * @Rest\View(serializerGroups={"api_task_get"}, statusCode=201)
     * @ParamConverter(
     *     "taskDTO",
     *     converter="fos_rest.request_body",
     *     options={
     *          "deserializationContext"={"groups"="api_task_update"},
     *          "validator"={"groups"={"api_task_update"}}
     *     }
     * )
     */
    public function updateAction(TaskDTO $taskDTO, ConstraintViolationListInterface $validationErrors, $id)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.project.task')->updateTask($taskDTO, $id);
    }

    /**
     * @Rest\GET("/tasks/{id}")
     * @Rest\View(serializerGroups={"api_task_get"}, statusCode=200)
     */
    public function viewAction($id)
    {
        return $this->get('app.manager.project.task')->getTaskById($id);
    }

    /**
     * @Rest\Delete("/tasks/{id}")
     */
    public function deleteAction($id)
    {
        return $this->get('app.manager.project.task')->deleteTaskById($id);
    }
}