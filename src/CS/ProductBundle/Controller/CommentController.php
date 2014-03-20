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
		
		
		$comment = new Comment();
		
		$form = $this->createForm(new CommentType(), $comment);
		
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			
			$product = $this->getDoctrine()
			->getRepository('CSProductBundle:Product')
			->findOneById($product_id);
				
			$product->addComment($comment);
			$comment->setProduct($product);
			
			
			$entityManager->persist($comment);
			$entityManager->flush(); // Save changes in database.
			
			return $this->redirect($this->generateUrl('cs_product_show',array('id'=>$product->getId())));
		}
		return $this->render('CSProductBundle:Comment:addComment.html.twig'
				,array('form' => $form->createView() , 'product_id' => $product_id));
	}
	
}
