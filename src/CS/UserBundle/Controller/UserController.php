<?php

namespace CS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserController extends Controller {
	public function manageCommunityAction(Request $request) {
		return $this
				->render('CSUserBundle:Community:manageCommunity.html.twig',
						array('name' => $name));
	}
}
