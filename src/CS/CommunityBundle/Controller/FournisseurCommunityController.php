<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;

class FournisseurCommunityController extends Controller
{
	public function loadPossibleCommunityAction($themeName) {
	
		$tagManager = $this->getContainer ()->get ( 'fpn_tag.tag_manager' );
		
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
		
		$themeRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Theme');
		
		$theme = self::$repository->findOneBy ( array (
				'title' => $themeName
		) );
		
		$tagManager->loadTagging($theme);
		
		$communities_theme = $theme->getTags();
		
		// get the community and count for all <type>
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		$communities = array();
		
		foreach ($communities_theme as $community) {
			if(array_key_exists ( $community->getName() , $communities_user )){
				$communities[$community->getName()] = $communities_user[$community->getName()];
			}else{
				$communities[$community->getName()] = 0;
			} 
		}
	
		return $this
		->render('CSCommunityBundle:Community:loadPossibleCommunities.html.twig',
				array('communities' => $communities));
	}

}
