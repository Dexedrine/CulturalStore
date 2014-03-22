<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;
use Doctrine\Common\Collections\ArrayCollection;

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
    
    public function valideProposedCommunityAction(){
    	
    	$repository = $this->getDoctrine()->getRepository('CSProductBundle:Product');
    	
    	$products = $repository->findAll();
    	
    	$productsWithProposedCommunities=  array();
    	 
    	foreach ($products as $product){
    		if ($product->getProposedCommunities()->count() > 0){
    			$productsWithProposedCommunities[] = $product;
    		}
    	}
    	
    	return $this->render('CSCommunityBundle:Community:validerProposedCommunity.html.twig',
    			array("products" => $productsWithProposedCommunities ));
    	
    }
    
    public function validateProposedCommunityAction($product_id){
    	 
    	$entityManager = $this->getDoctrine()->getEntityManager();
    	$tagManager = $this->get('fpn_tag.tag_manager');
    	
    	$product = $entityManager->getRepository('CSProductBundle:Product')->findOneById($product_id);
    	$theme = $product->getTheme();
    	$tagManager->loadTagging($product);
    	$tagManager->loadTagging($theme);
    	
    	foreach ($product->getProposedCommunities() as $community){
    		$c = $tagManager->loadOrCreateTag($community->getName());
    		
    		$product->removeProposedCommunity($c);
    		$product->addCommunity($c);
   
    		$product->addTag($c);

    		$theme->addTag($c);
    		
    	}
    	$tagManager->saveTagging($product);
    	$tagManager->saveTagging($theme);
    	$entityManager->flush();
    	
    	// assign the foo tag to the post
    	return $this->redirect($this->generateUrl('valide_proposed_community'));
    	    	 
    }
}
