<?php

namespace AppBundle\Controller\Project;

use CoreDomain\DTO\Project\SearchDTO;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
            SerializationContext::create()->setGroups('api_project_get')
        );

        $response = new Response($content);
        $response->headers->set('X-Total-Count', $projectManager->search($searchDTO, true));

        return $response;
    }
}