<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;

class AdminCommunityController extends Controller
{
	public function createThemeAction(Request $request)
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
