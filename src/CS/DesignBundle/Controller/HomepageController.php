<?php

namespace CS\DesignBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class HomepageController extends Controller {
	public function homepageAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		return $this
				->render('CSDesignBundle:Homepage:homepage.html.twig', array('user'=>$user));
	}
}
