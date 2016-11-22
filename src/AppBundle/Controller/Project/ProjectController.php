<?php

namespace AppBundle\Controller\Project;

use CoreDomain\DTO\Project\SearchDTO;

use JMS\Serializer\DeserializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Rest\Get("/projects")
     * @Rest\View(serializerGroups="api_project_get", statusCode=200)
     */
    public function listAction(Request $request)
    {
        $searchDTO = $this->get('jms_serializer')->deserialize(
            json_encode($request->query->all()),
            SearchDTO::class,
            'json',
            DeserializationContext::create()->setGroups(['api_project_search'])
        );

        return $this->get('app.managers.project.project')->search($searchDTO);
    }
}