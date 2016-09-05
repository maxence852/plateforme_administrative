<?php

namespace Tfe\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UsersController extends Controller
{
    public function indexAction()
    {
        /*$repository = $this ->getDoctrine()->getManager()->getRepository('TfeAdminBundle:Admins');
        $users= $repository->FindUsersAscAll();*/
        $userManager     = $this->getDoctrine()->getManager();
        $sql = "SELECT  * FROM tfe_users ORDER BY username ASC";
        $users = $userManager->getConnection()->prepare($sql);$users->execute();

        return $this->render('TfeAdminBundle:Users:listeUsers.html.twig',array(
            'users'=> $users
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
