<?php

namespace Tfe\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        return $this->render('TfeAdminBundle:Users:listeUsers.html.twig');
    }
}
