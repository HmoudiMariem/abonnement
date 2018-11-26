<?php

namespace AbonnementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Abonnement/Default/index.html.twig');
    }
}
