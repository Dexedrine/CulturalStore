<?php

namespace CS\DesignBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class HomepageController extends Controller {
	public function homepageAction() {
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		return $this
				->render('CSDesignBundle:Homepage:homepage.html.twig', array('user'=>$user));
	}
	
	public function errorLoginAction() {
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		return $this
				->render('CSDesignBundle:Homepage:homepage.html.twig', array('user'=>$user,'login'=>"error"));
	}
}
