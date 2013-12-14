<?php

namespace CS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserController extends Controller {
	
	
	public function deleteUserAction(){
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		
		$entityManager =  $this->getDoctrine()->getManager();
		$entityManager->remove($user);
		$entityManager->flush();
		return $this->redirect($this->generateUrl('cs_design_homepage'));		
	}
}
