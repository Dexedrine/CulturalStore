<?php

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class AdminhomepageController extends Controller {
	public function adminhomepageAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		return $this
				->render('CSAdminBundle:Homepage:homepageAdmin.html.twig', array('user'=>$user));
	}
}
