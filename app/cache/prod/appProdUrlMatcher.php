<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/users')) {
                // user_create_user
                if ($pathinfo === '/api/users') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_user_create_user;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\User\\UserController::createUserAction',  '_format' => 'json',  '_route' => 'user_create_user',);
                }
                not_user_create_user:

                // user_get_user
                if (preg_match('#^/api/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_user_get_user;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_get_user')), array (  '_controller' => 'AppBundle\\Controller\\User\\UserController::getUserAction',  '_format' => 'json',));
                }
                not_user_get_user:

            }

            if (0 === strpos($pathinfo, '/api/sessions')) {
                // session_create_session
                if ($pathinfo === '/api/sessions') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_session_create_session;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\User\\UserSessionController::createSessionAction',  '_format' => 'json',  '_route' => 'session_create_session',);
                }
                not_session_create_session:

                // session_finish_session
                if ($pathinfo === '/api/sessions') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_session_finish_session;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\User\\UserSessionController::finishSessionAction',  '_format' => 'json',  '_route' => 'session_finish_session',);
                }
                not_session_finish_session:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
