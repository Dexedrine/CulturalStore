<?php

namespace CS\FournisseurBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {
	public function dashboardAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		
		//http://localhost/piwik/?module=API&method=Goals.getItemsSku&idSite=1&token_auth=28078f92dd5611a6c1ff732ceee13d36&&period=year&date=2014-01-01
		return $this
				->render('CSFournisseurBundle:Dashboard:dashboard.html.twig', array('user'=>$user));
	}
}
