<?php

namespace CS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserController extends Controller {
	public function manageCommunityAction() {
		
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
		
		// find all article ids matching a particular query
		//$ids = $tagRepo->getResourceIdsForTag('article_type', 'footag');
		
		// get the tags and count for all articles
		$communities = $tagRepo->getTagsWithCountArray('theme');
		
		
		return $this
				->render('CSUserBundle:Community:manageCommunity.html.twig',
						array('communities' => $communities));
	}
	
	public function deleteUserAction(){
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		
		$entityManager =  $this->getDoctrine()->getManager();
		$entityManager->remove($user);
		$entityManager->flush();
		return $this->redirect($this->generateUrl('cs_design_homepage'));		
	}
}
