<?php

namespace CS\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CS\CartBundle\Entity\Cart;
use Symfony\Component\Security\Core\SecurityContext;

class CartController extends Controller {
	
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
	
	private function getProductFromRepository($product_id){
		$this->em = $this->getDoctrine()->getManager();
		$repository_product = $this->container->get('sylius.repository.product' );
		$product = $repository_product->findOneBy(array (
				'id' => $product_id
		));

		return $product;
	}
	
	public function showCartAction() {
		$user = $this->getConnectedUser();
		$cart = $this->getCurrentCart();
				
		return $this->render('CSCartBundle:Cart:cart.html.twig', array (
				'user' => $user,
				'cart' => $cart 
		) );
	}
	
	public function addProductAction($product_id) {
		$session = $this->getRequest()->getSession();
			
		$user = $this->getConnectedUser();
		$cart = $this->getCurrentCart();
		$product = $this->getProductFromRepository($product_id);
		
		if(!$cart){
			$cart = new Cart();
			if(!$user){
				$session->set('cart', $cart);
			}
			else{
				$user->setCart($cart);
			}			
		}
		
		$cart->addProduct($product);			
		$this->em->flush();
		$session->save();
				
		return $this->redirect($this->generateUrl('show_cart'));
	}
	
	public function deleteProductAction($product_id) {
		$session = $this->getRequest()->getSession();
		$this->em = $this->getDoctrine()->getManager();
		
		$user = $this->getConnectedUser();
		$cart = $this->getCurrentCart();
		$cart->removeProductWithId($product_id);
		
		if(!$user){
			$session->save();
		}
		else{
			$this->em->flush();
		}
			
		return $this->redirect($this->generateUrl('show_cart'));
	}
	
	public function validateCartAction(){
		$user = $this->getConnectedUser();
		$cart = $this->getCurrentCart();		

		//if user is not connected, go to login
		if(!$user){
			$this->get('session')->getFlashBag()->add(
            	'notice',
            	'Vous devez être identifié pour valider votre panier!');
			
	        return $this->redirect($this->generateUrl('show_cart'));
		}
		
		return $this->render('CSCartBundle:Checkout:payment.html.twig', array (
				'cart' => $cart 
		));
	}
}
