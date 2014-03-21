<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CS\ProductBundle\Entity\Comment;
use CS\ProductBundle\Form\Type\CommentType;

class CommentController extends Controller
{
	public function addCommentAction(Request $request,$product_id)
	{
		$entityManager = $this->getDoctrine()->getManager();
		
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		
		$purchasedProducts = $user->getPurchasedProducts();
		$showForm = false;
		foreach ($purchasedProducts as $purchasedProduct){
			if ($purchasedProduct->getId() == $product_id){
				$showForm = true;
			}
		}
		
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById($product_id);
		$comment = null ;
		foreach ( $product->getComments() as $productComment){
			if($productComment->getUser()->getId() == $user->getId()){
				$comment = $productComment;
			}
		}
		if($comment == null ){
			$comment = new Comment();
		}
		$form = $this->createForm(new CommentType(), $comment);
		
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			
			
				
			$product->addComment($comment);
			$comment->setProduct($product);
			$comment->setUser($user);
			
			
			$entityManager->persist($comment);
			$entityManager->flush(); // Save changes in database.
			
			return $this->redirect($this->generateUrl('cs_product_show',array('id'=>$product->getId())));
		}
		return $this->render('CSProductBundle:Comment:addComment.html.twig'
				,array('form' => $form->createView() , 'product_id' => $product_id, 'showForm' => $showForm));
	}
	

	public function showCommentAction($product_id) {
		$product = $this->getDoctrine()
		->getRepository('CSProductBundle:Product')
		->findOneById($product_id);
		
		return $this->render ( 'CSProductBundle:Comment:showComment.html.twig', array (
				'comments' => $product->getComments()->slice( 0, 5)
		) );
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
