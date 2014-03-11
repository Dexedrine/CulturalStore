<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;
use CS\CommunityBundle\Form\Type\ProposeNewCommunityType;
use CS\ProductBundle\Entity\Product;

class FournisseurCommunityController extends Controller
{
	public function manageCommunityProductAction($product_id) {
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById(intval($product_id));
			
		
		return $this
		->render('CSCommunityBundle:Community:manageCommunityProduct.html.twig',
			array('product' => $product) );
	}

	
	public function showCommunitiesProductAction($product_id) {
	
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById(intval($product_id));
			
		
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$entityManager = $this->getDoctrine()->getManager();
		$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
	
	
		$tagManager->loadTagging($product);
		
		
		// get the community and count for all <type>
		$communities_product = $product->getTags();
		$communities_user = $tagRepo->getTagsWithCountArray('user');
		$communities = array();
	
		foreach ($communities_product as $community) {
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
	
	public function addCommunityProductAction($communityName, $product_id) {

		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById(intval($product_id));
		
		$entityManager = $this->getDoctrine()->getManager();
		
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($product);
	
		$product->addTag($community);
		$product->addCommunity($community);
		
		$entityManager->flush();
		
		// assign the foo tag to the post
		$tagManager->saveTagging($product);
	
		return $this->redirect($this->generateUrl('manage_community_product', array('product_id' => $product_id)));
	}
	
	public function removeCommunityProductAction($communityName,  $product_id) {

		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById(intval($product_id));
			
		$entityManager = $this->getDoctrine()->getManager();
		
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($product);
	
		$product->removeTag($community);
		$product->removeCommunity($community);
		
		$entityManager->flush();
		
		// assign the foo tag to the post
		$tagManager->saveTagging($product);
	
		return $this->redirect($this->generateUrl('manage_community_product' , array('product_id'=> $product_id)));
	}
	
	public function proposeNewCommunityAction(Request $request, $product_id )
	{
		 
		$tagManager = $this->get('fpn_tag.tag_manager');
		//$communities = $tagManager->loadTagging($theme);
	
		$form = $this->createForm(new ProposeNewCommunityType());
	
		if ($request->isMethod('POST')) {
			$form->bind($request);
	
			if ($form->isValid()) {
	
				/*$em = $this->getDoctrine()->getManager();
	
				$newCommunities = array();
				foreach ($theme->getTags() as $community)
					$newCommunities[] = $community;
				 
				$tagManager->replaceTags($newCommunities, $theme);
				 
				$em->persist($theme);
				$em->flush();
				 
				$tagManager->saveTagging($theme);
	
				return $this->redirect($this->generateUrl('cs_community_homepage'));*/
			}
		}
	
		return $this
		->render('CSCommunityBundle:Community:proposeNewCommunity.html.twig',
				array('form' => $form->createView(), 'product_id' => $product_id ));
	}
} 
