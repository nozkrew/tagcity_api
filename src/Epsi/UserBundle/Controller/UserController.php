<?php

namespace Epsi\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * @Route("/create")
     */
    public function postCreateAction(Request $request){
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setUsername($request->get('username'));
        $user->setEmail($request->get('email'));
        $user->setPlainPassword($request->get('password'));
        $user->setEnabled(true);

        $validator = $this->get('validator');
        $errors = $validator->validate($user, array('Registration'));
        if (count($errors) == 0) {
            $userManager->updateUser($user);
            return new JsonResponse("Utilisateur créé");
            //return $user;
        }
        else {
            return new JsonResponse("Erreur création");
            //return $errors;
        }
    }
}
