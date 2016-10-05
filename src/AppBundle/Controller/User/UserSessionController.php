<?php

namespace AppBundle\Controller\User;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserSessionController extends Controller
{
    /**
     * @Rest\Post("/sessions")
     * @Rest\View(serializerGroups="api_session_get", statusCode=201)
     */
    public function createSessionAction(Request $request)
    {
        return $this->get('app.managers.user.user')->login(
            $request->get('email'),
            $request->get('password')
        );
    }

    /**
     * @Rest\Delete("/sessions")
     * @Rest\View(statusCode=200)
     */
    public function finishSessionAction()
    {
        $this->get('app.managers.user.user')->logout($this->getUser());
    }
}
