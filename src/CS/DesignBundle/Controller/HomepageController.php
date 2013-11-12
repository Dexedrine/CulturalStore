<?php

namespace CS\DesignBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller {
	public function homepageAction() {
		return $this
				->render('CSDesignBundle:Homepage:homepage.html.twig');
	}
}
