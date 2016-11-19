<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation as Nelmio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UsersController.
 */
class UserController extends FOSRestController
{
    /**
     * Test API options and requirements.
     *
     * @return Response
     *
     * @Nelmio\ApiDoc(
     *     resource = true,
     *     statusCodes = {
     *         Response::HTTP_OK: "OK"
     *     }
     * )
     */
    public function optionsUsersAction() : Response
    {
        $response = new Response();
        $response->headers->set('Allow', 'OPTIONS, GET, POST, PUT');

        return $response;
    }

    /**
     * Returns a user.
     *
     * @param $user_id
     *
     * @return mixed
     *
     * @FOSRest\View(serializerGroups={"Users_getUser"})
     *
     * @Nelmio\ApiDoc(
     *     resource = true,
     *     statusCodes = {
     *         Response::HTTP_OK: "OK"
     *     }
     * )
     */
    public function getUserAction($user_id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em
            ->getRepository(User::class)
            ->find($user_id);

        if (!$user instanceof User) {
            throw new NotFoundHttpException('Not found');
        }

        return $user;
    }

    /**
     * Returns all users.
     *
     * @return mixed
     *
     * @FOSRest\View(serializerGroups={"Users_getUsers"})
     *
     * @Nelmio\ApiDoc(
     *     resource = true,
     *     statusCodes = {
     *         Response::HTTP_OK: "OK"
     *     }
     * )
     */
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em
            ->getRepository(User::class)
            ->findAll();

        return $users;
    }

    /**
     * Delete a user.
     *
     * @param $user_id
     *
     * @throws NotFoundHttpException
     * @FOSRest\View(statusCode = 204)
     * @FOSRest\Delete(
     *     requirements = {
     *         "user_id"   : "\d+",
     *         "_format"   : "json|xml"
     *     },
     *     defaults = {"_format": "json"}
     * )
     *
     * @Nelmio\ApiDoc(
     *     statusCodes = {
     *         Response::HTTP_NO_CONTENT: "No Content",
     *         Response::HTTP_NOT_FOUND : "Not Found"
     *     }
     * )
     */
    public function deleteUserAction($user_id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em
            ->getRepository(User::class)
            ->find($user_id);

        if (!$user instanceof User) {
            throw new NotFoundHttpException();
        }

        $em->remove($user);
        $em->flush();
    }
}