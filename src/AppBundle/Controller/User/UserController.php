<?php

namespace AppBundle\Controller\User;

use CoreDomain\DTO\User\ProfileDTO;
use CoreDomain\DTO\User\UserRegisterDTO;
use CoreDomain\Exception\AccessDeniedException;
use CoreDomain\Exception\ValidationException;
use CoreDomain\Model\User\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\ConstraintViolationListInterface;

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
