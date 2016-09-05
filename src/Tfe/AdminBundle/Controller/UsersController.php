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
        /*$em     = $this->getDoctrine()->getManager();
        $user = $em->find('\..\..\..\..\..\plateforme_sociale\src\Tfe\UserBundle\Entity', $id);*/

        /*$user = new User();
        $user->getUsername($id);
        $user->getName($id);*/

        //$userManager = $this->get('fos_user.user_manager');
        //$user = $userManager->find($id);
        return $this->render('TfeAdminBundle:Users:profilUser.html.twig', array(
            'user'=> $user

        ));
    }
}
