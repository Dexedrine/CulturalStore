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
		
		$count = $communities_user[$communityName];
		
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
	
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
		
		$tagManager->loadTagging($user);
		
		$user->addTag($community);
		
		// assign the foo tag to the post
		$tagManager->saveTagging($user);	
	
		return $this->redirect($this->generateUrl('manage_community'));
	}
	
	public function removeCommunityUserSessionAction($communityName) {
	
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
	
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($user);
	
		$user->removeTag($community);
	
		// assign the foo tag to the post
		$tagManager->saveTagging($user);
	
		return $this->redirect($this->generateUrl('manage_community'));
	}
	
	
    public function createAction(Request $request)
    {
                $theme = new Theme();

                $form = $this->createForm(new ThemeType(), $theme);

                if ($request->isMethod('POST')) {
                        $form->bind($request);

                        if ($form->isValid()) {

                                $em = $this->getDoctrine()->getManager();
                            
                                $em->persist($theme);
                                $em->flush();

                                return $this->redirect($this->generateUrl('cs_community_homepage'));
                        }
                }

                return $this
                                ->render('CSCommunityBundle:Community:createTheme.html.twig',
                                                array('form' => $form->createView(),   ));
    }
    
    public function addCommunityAction(Request $request, $idtheme)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('CSCommunityBundle:Theme');
  
    	
    	$theme = $repository->findOneById($idtheme);
    	
    	$tagManager = $this->get('fpn_tag.tag_manager');
    	$communities = $tagManager->loadTagging($theme);

    	$originalCommunities = array();
    	
    	if($communities){ 
    		$theme->setTags($communities);
    	}
    
    	$form = $this->createForm(new AddCommunityType(), $theme);
    
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    
    		if ($form->isValid()) {
    			    			
    			$em = $this->getDoctrine()->getManager();
    
    			$newCommunities = array();
    			foreach ($theme->getTags() as $community)
    				$newCommunities[] = $community;
    			
    			$tagManager->replaceTags($newCommunities, $theme);
    			
    			$em->persist($theme);
    			$em->flush();
    			
    			$tagManager->saveTagging($theme);
    
    			return $this->redirect($this->generateUrl('cs_community_homepage'));
    		}
    	}
    
    	return $this
    	->render('CSCommunityBundle:Community:addCommunity.html.twig',
    			array('form' => $form->createView(), 'idtheme' => $idtheme ));
    }
}
