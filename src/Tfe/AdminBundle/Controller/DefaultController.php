<?php

namespace Tfe\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TfeAdminBundle:Default:index.html.twig');
    }
}
