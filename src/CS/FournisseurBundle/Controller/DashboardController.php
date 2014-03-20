<?php

namespace CS\FournisseurBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {
	public function dashboardAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		return $this
				->render('CSFournisseurBundle:Dashboard:dashboard.html.twig', array('user'=>$user));
	}
}
