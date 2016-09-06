<?php

namespace Tfe\AdminBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UsersController extends Controller
{
    public function indexAction(Request $request)
    {

        $userManager     = $this->getDoctrine()->getManager();
        $sql = "SELECT  * FROM tfe_users ORDER BY username ASC";
        $users = $userManager->getConnection()->prepare($sql);$users->execute();

        /*$paginator  = $this->get('knp_paginator');
        $users = $paginator->paginate(
            $users,
            $request->query->getInt('page', 1),
            5
        );*/
        return $this->render('TfeAdminBundle:Users:listeUsers.html.twig',array(
            'users'=> $users,
            //'paginator'=> $paginator,


        ));
    }

    public function profilAction($id)
    {
        $userManager     = $this->getDoctrine()->getManager();
        $sql = "SELECT  * FROM tfe_users WHERE id = '$id'";
        $user = $userManager->getConnection()->prepare($sql);$user->execute();

        return $this->render('TfeAdminBundle:Users:profilUser.html.twig', array(
            'user'=> $user

        ));
    }

    public function desactivationCompteAction($id)
    {
        $userManager     = $this->getDoctrine()->getManager();
        $sql = "UPDATE tfe_users SET locked = TRUE WHERE id = '$id'";
        $user = $userManager->getConnection()->prepare($sql);$user->execute();


        return $this->redirectToRoute('tfe_admin_user_list');
    }

    public function activationCompteAction($id)
    {
        $userManager     = $this->getDoctrine()->getManager();
        $sql = "UPDATE tfe_users SET locked = FALSE WHERE id = '$id'";
        $user = $userManager->getConnection()->prepare($sql);$user->execute();


        return $this->redirectToRoute('tfe_admin_user_list');
    }
}
