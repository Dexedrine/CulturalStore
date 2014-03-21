<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\ProductBundle\Entity\Comment;
use CS\ProductBundle\Form\Type\PromotionType;
use CS\ProductBundle\Entity\Promotion;

class PromotionController extends Controller
{
	
	public function indexAction(Request $request){
	
		$repository = $this->getDoctrine()->getRepository('CSProductBundle:Promotion');
		
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		
		$productPaginator = $repository->createPaginator($four);
		
		$productPaginator
		->setCurrentPage($request->get('page', 1), true, true)
		->setMaxPerPage(15);
	
		return $this->render('CSProductBundle:Promotion:index.html.twig',
				array("resources" => $productPaginator,
						"promotions" => $productPaginator->getCurrentPageResults()));
	
	}
	
	
	public function addPromotionAction(Request $request)
	{
		$entityManager = $this->getDoctrine()->getManager();
		
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
				
		$promotion = new Promotion();
		
		
		$form = $this->createForm(new PromotionType(), $promotion);
		
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			
			$promotion->setFournisseur($four);
						
			$entityManager->persist($promotion);
			$entityManager->flush(); // Save changes in database.
			
			return $this->redirect($this->generateUrl('cs_product_manage_promotion',
								array('promotion_id'=>$promotion->getId())));
		}
		return $this->render('CSProductBundle:Promotion:addPromotion.html.twig'
				,array('form' => $form->createView() ));
	}
	

	public function managePromotionAction(Request $request, $promotion_id) {
		$promotion = $this->getDoctrine()
		->getRepository('CSProductBundle:Promotion')
		->findOneById($promotion_id);
		
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		
		$repository = $this->getDoctrine()->getRepository('CSProductBundle:Product');
		$productPaginator = $repository->createPaginator($four);
		
		$productPaginator
		->setCurrentPage($request->get('page', 1), true, true)
		->setMaxPerPage(15);
		
		
		return $this->render('CSProductBundle:Promotion:managePromotion.html.twig',
				array("promotion" => $promotion,
						"resources" => $productPaginator,
						"products" => $productPaginator->getCurrentPageResults()));
	}
	
	public function addProductToPromotionAction($promotion_id,$product_id) {
		
		$entityManager = $this->getDoctrine()->getManager();
		
		$promotion = $this->getDoctrine()
		->getRepository('CSProductBundle:Promotion')
		->findOneById($promotion_id);
	
		
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById($product_id);
		
		$product->addPromotion($promotion);
		$entityManager->flush();
		
		return $this->redirect($this->generateUrl('cs_product_manage_promotion',
				array('promotion_id'=>$promotion->getId())));
		
	}
	
	public function removeProductFromPromotionAction($promotion_id,$product_id) {
	
		$entityManager = $this->getDoctrine()->getManager();
	
		$promotion = $this->getDoctrine()
		->getRepository('CSProductBundle:Promotion')
		->findOneById($promotion_id);
	
	
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById($product_id);
	
		$product->removePromotion($promotion);
		$entityManager->flush();
	
		return $this->redirect($this->generateUrl('cs_product_manage_promotion',
				array('promotion_id'=>$promotion->getId())));
	
	}
	
	public function getTop5Action() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.comment' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => '*'
						)
				),
				// default sort
				'sort' => array(
						'id' => array(
								'order' => 'desc'
						)
				)
		));
	
		$comments = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Comment:top5Comment.html.twig', array (
				'comments' => array_slice($comments, 0, 5)
		) );
	}
	
}
