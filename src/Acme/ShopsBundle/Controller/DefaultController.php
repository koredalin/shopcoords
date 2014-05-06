<?php

namespace Acme\ShopsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeShopsBundle:Default:index.html.twig', array('name' => $name));
    }
}
