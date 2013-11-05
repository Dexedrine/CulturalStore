<?php

namespace CS\DesignBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CSDesignBundle:Default:index.html.twig', array('name' => $name));
    }
}
