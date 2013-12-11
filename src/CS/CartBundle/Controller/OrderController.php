<?php

namespace CS\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CS\CartBundle\Entity\Cart;
use Symfony\Component\Security\Core\SecurityContext;

class OrderController extends Controller {
	
	private function getConnectedUser(){
		$user = $this->get('security.context')->getToken()->getUser();
		if("anon." === $user) return null;
		return $user;
	}
	
	private function getCurrentCart(){
		$session = $this->getRequest()->getSession();
		$user = $this->getConnectedUser();
	
		if (!$user) {
			$cart = $session->get('cart');
		} else {
			$cart = $user->getCart();
		}
		return $cart;
	}
	
	public function validatePaymentAction(){
		$this->em = $this->getDoctrine ()->getManager ();
		$cart = $this->getCurrentCart();
		$cart->emptyCart();
		$this->em->flush();
		//TODO create an order
		
		return $this->render ( 'CSCartBundle:Checkout:summary.html.twig', array (
				'cart' => $cart 
		));
	}

}