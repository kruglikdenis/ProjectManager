<?php

namespace AppBundle\Controller\User;

use CoreDomain\DTO\User\SearchDTO;
use CoreDomain\DTO\User\ProfileDTO;
use CoreDomain\DTO\User\UserRegisterDTO;
use CoreDomain\Exception\AccessDeniedException;
use CoreDomain\Exception\ValidationException;
use CoreDomain\Model\User\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\ConstraintViolationListInterface;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Rest\Post("/users")
     * @Rest\View(serializerGroups="api_user_get", statusCode=201)
     * @ParamConverter(
     *      "userDTO",
     *      converter="fos_rest.request_body",
     *      options={
     *          "deserializationContext"={"groups"="api_user_post"},
     *          "validator"={"groups"={"api_user_post"}}
     *      }
     * )
     */
    public function createUserAction(UserRegisterDTO $userDTO, ConstraintViolationListInterface $validationErrors)
    {
        if (count($validationErrors) > 0) {
            throw new ValidationException('Bad request', $validationErrors);
        }

        return $this->get('app.managers.user.user')->register($userDTO);
    }

    /**
     * @Rest\Get("/users")
     */
    public function searchAction(Request $request)
    {
        $searchDTO = $this->get('jms_serializer')->deserialize(
            json_encode($request->query->all()),
            SearchDTO::class,
            'json',
            DeserializationContext::create()->setGroups(['api_user_search'])
        );

        $userManager = $this->get('app.managers.user.user');

        $users = $userManager->searchUser($searchDTO);

        $content = $this->get('serializer')->serialize(
            $users,
            'json',
            SerializationContext::create()->setGroups('api_user_get')
        );

        $response = new Response($content);
        $response->headers->set('X-Total-Count', $userManager->searchUser($searchDTO, true));

        return $response;
    }

    /**
     * @Rest\Get("/users/{id}")
     * @Rest\View(serializerGroups="api_user_get", statusCode=200)
     */
    public function getUserAction(User $user)
    {
        $this->checkAccess($user);
        return $user;
    }

    private function checkAccess(User $user)
    {
        $currentUser = $this->getUser();
        if (!$currentUser || $currentUser->getId() !== $user->getId()) {
            throw new AccessDeniedException();
        }
    }
}
