<?php

namespace Tfe\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TfeAdminBundle:Default:index.html.twig');
    }

    public function statistiquesAction()
    {
        $userManager = $this->getDoctrine()->getManager();
        //$nbUsers = new Statistiques();
        //calcule le nombre d'utilisateurs

        $sql = "SELECT COUNT(id) AS nb FROM tfe_users";
        $nbUsers = $userManager->getConnection()->prepare($sql);
        $nbUsers->execute();



        //calcule le nbr de publications
        //$userManager = $this->getDoctrine()->getManager();
        $sql2 = "SELECT COUNT(id) FROM publication";
        $nbPublication = $userManager->getConnection()->prepare($sql2);
        $nbPublication->execute();

        //Calcule le nombre de commentaire ds le forum
        $userManager = $this->getDoctrine()->getManager();
        $sql3 = "SELECT COUNT(id) FROM forum_comment";
        $nbCommentForum = $userManager->getConnection()->prepare($sql3);
        $nbCommentForum->execute();

        //Calcule le nombre de commentaire des publicationsc
        $userManager = $this->getDoctrine()->getManager();
        $sql4 = "SELECT COUNT(id) FROM comment_publication";
        $nbCommentPublication = $userManager->getConnection()->prepare($sql4);
        $nbCommentPublication->execute();

        return $this->render('TfeAdminBundle:Statistiques:statistiques.html.twig',array(
            'nbUsers' => $nbUsers,
            'nbPublication' => $nbPublication,
            'nbCommentForum' => $nbCommentForum,
            'nbCommentPublication' => $nbCommentPublication
        ));
    }
}
