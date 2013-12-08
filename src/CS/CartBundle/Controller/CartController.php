<?php

namespace CS\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sylius\Bundle\CartBundle\Controller\CartController;

class CartController extends CartController
{
    public function indexAction($name)
    {
        return $this->render('CSCartBundle:Default:index.html.twig', array('name' => $name));
    }
}
