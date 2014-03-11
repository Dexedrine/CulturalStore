<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;

class UserCommunityController extends Controller
{
	
	public function manageCommunityAction() {
		
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
		
		// find all article ids matching a particular query
		//$ids = $tagRepo->getResourceIdsForTag('article_type', 'footag');
		
		// get the tags and count for all articles
		$communities = $tagRepo->getTagsWithCountArray('theme');
		
		
		return $this
				->render('CSCommunityBundle:Community:manageCommunity.html.twig',
						array('communities' => $communities));
	}
	
	
	public function showCommunitiesUserSessionAction() {
	
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		
		$tagManager = $this->get('fpn_tag.tag_manager');
		
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
	
		
		$tagManager->loadTagging($user);
		
		// get the community and count for all <type>
		$communities_user_session = $user->getTags();
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		$communities = array();
	
		foreach ($communities_user_session as $community) {
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
	
	public function addCommunityUserSessionAction($communityName) {
	
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
		
		$tagManager->loadTagging($user);
		
		$user->addTag($community);
		$user->addCommunity($community);
		
		$entityManager->flush();
		
		// assign the foo tag to the post
		$tagManager->saveTagging($user);	
	
		return $this->redirect($this->generateUrl('manage_community'));
	}
	
	public function removeCommunityUserSessionAction($communityName) {
	
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($user);
	
		$user->removeTag($community);
		$user->removeCommunity($community);
		
		$entityManager->flush();
		
		// assign the foo tag to the post
		$tagManager->saveTagging($user);
	
		return $this->redirect($this->generateUrl('manage_community'));
	}
}
