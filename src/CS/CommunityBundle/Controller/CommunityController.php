<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;

class CommunityController extends Controller
{
	
	public function homeAction()
	{		 
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('CSCommunityBundle:Theme');
		
		$themes = $repository->findAll();
		
		return $this->render('CSCommunityBundle:Community:communityHome.html.twig',array('themes' =>$themes));
	}
	
	
	public function pageCommunityAction($communityName) {
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
	
		
		
		// get the community and count for all <type>
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		
		$count = 0;
		if(array_key_exists( $communityName,$communities_user )){
			$count = $communities_user[$communityName];
		}
		
		$tagManager = $this->get('fpn_tag.tag_manager');
		
		$community = $tagManager->loadOrCreateTag($communityName);
		
		//récupérer produit de la communauté
	
		return $this
		->render('CSCommunityBundle:Community:pageCommunity.html.twig',
				array('community' => $community,
					'count' => $count,));
	}
	
	
	public function showCommunitiesTypeAction() {
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
	
		// get the community and count for all <type>
		$communities_theme = $tagRepo->getTagsWithCountArray('theme');
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		$communities = array();
		
		foreach ($communities_theme as $name => $count) {
			if(array_key_exists ( $name , $communities_user )){
				$communities[$name] = $communities_user[$name];
			}else{
				$communities[$name] = 0;
			} 
		}
	
		return $this
		->render('CSCommunityBundle:Community:showTag.html.twig',
				array('communities' => $communities));
	}
	
	public function showAllCommunitiesOfAction($metaKeyword) {
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
	
		$theme = $this->getThemeCorrespondingProductType($metaKeyword);
		
		$tagManager = $this->get('fpn_tag.tag_manager');
		
		$tagManager->loadTagging($theme);
		// get the community and count for all <type>
		$communities_theme = $theme->getTags();
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		$communities = array();
	
		foreach ($communities_theme as $community) {
			$name = $community->getName();
			if(array_key_exists ( $name , $communities_user )){
				$communities[$name] = $communities_user[$name];
			}else{
				$communities[$name] = 0;
			}
		}
	
		return $this
		->render('CSCommunityBundle:Community:showTag.html.twig',
				array('communities' => $communities));
	}
	
	private function getThemeCorrespondingProductType($metakeyword){
		$correspondingThemeTitle = null;
		if ($metakeyword == "video" ){
			$correspondingThemeTitle = "Cinema";
		}
		else if ($metakeyword == "book" ){
			$correspondingThemeTitle = "Livres";
		}
		else if ($metakeyword == "ticket" ){
			$correspondingThemeTitle = "Spectacles";
		}
		else if ($metakeyword == "game" ){
			$correspondingThemeTitle = "Jeux videos";
		}
		else if ($metakeyword == "music" ){
			$correspondingThemeTitle = "Musique";
		}
		else if ($metakeyword == "application" ){
			$correspondingThemeTitle = "Applications";
		}
		$repository = $this->get('doctrine')
		->getManager()
		->getRepository('CSCommunityBundle:Theme');
		return $repository->findOneBy ( array (
				'title' => $correspondingThemeTitle ) );
	}
	
}
