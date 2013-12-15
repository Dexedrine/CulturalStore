<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\CommunityBundle\Entity\Theme;
use CS\CommunityBundle\Form\Type\ThemeType;
use CS\CommunityBundle\Entity\Community;
use CS\CommunityBundle\Form\Type\AddCommunityType;
use CS\ProductBundle\Entity\Product;

class FournisseurCommunityController extends Controller
{
	public function manageCommunityProductAction($product_id) {
		
		$repository = $this->get('sylius.repository.product');
		$product = $repository->find(intval($product_id));
		
		
		return $this
		->render('CSCommunityBundle:Community:manageCommunityProduct.html.twig',
			array('product' => $product) );
	}

	
	public function showCommunitiesProductAction($product_id) {
	
		$repository = $this->get('sylius.repository.product');
		$product = $repository->find(intval($product_id));
		
		
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

		$repository = $this->get('sylius.repository.product');
		$product = $repository->find(intval($product_id));
		
		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($product);
	
		$product->addTag($community);
	
		// assign the foo tag to the post
		$tagManager->saveTagging($product);
	
		return $this->redirect($this->generateUrl('manage_community_product', array('product_id' => $product_id)));
	}
	
	public function removeCommunityProductAction($communityName,  $product_id) {

		$repository = $this->get('sylius.repository.product');
		$product = $repository->find(intval($product_id));

		$tagManager = $this->get('fpn_tag.tag_manager');
	
		$community = $tagManager->loadOrCreateTag($communityName);
	
		$tagManager->loadTagging($product);
	
		$product->removeTag($community);
	
		// assign the foo tag to the post
		$tagManager->saveTagging($product);
	
		return $this->redirect($this->generateUrl('manage_community_product' , array('product_id'=> $product_id)));
	}
}
