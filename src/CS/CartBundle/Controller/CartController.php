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
				$cart->setUser($user);
			}			
		}
		
		$cart->addProduct($product);			
		$this->em->flush();
				
		return $this->render('CSCartBundle:Cart:cart.html.twig', array (
				'user' => $user,
				'cart' => $cart 
		));
	}
	
	public function deleteProductAction($product_id) {
		$session = $this->getRequest()->getSession();
		
		$user = $this->getConnectedUser();
		$cart = $this->getCurrentCart();		
		$product = $this->getProductFromRepository($product_id);
		$cart->removeProduct($product);//ne marche pas si pas co

		if(!$user){
			$session->set('cart', $cart);
		}
		else{
			$this->em->flush();
		}
		
		return $this->render ( 'CSCartBundle:Cart:cart.html.twig', array (
				'user' => $user,
				'cart' => $cart
		));
	}
	
	public function validateCartAction(){	
		$cart = $this->getCurrentCart();
		return $this->render('CSCartBundle:Checkout:payment.html.twig', array (
				'cart' => $cart 
		));
	}
}
