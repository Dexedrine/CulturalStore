<?php

namespace CS\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CS\CartBundle\Piwik\PiwikTracker;
use CS\CartBundle\Entity\Cart;
use CS\CartBundle\Entity\Order;
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
		
		$t = new PiwikTracker(1);
			
		$user = $this->getConnectedUser();		
		$cart = $this->getCurrentCart();
		$order = new Order();
		$totalPrice = 0;
		$discount = false;
		foreach ($cart->getProducts() as $item){
			//$t->addEcommerceItem($item->getId(), $item->getName() , $item->getFournisseur()->getId(), $item->getPrice(), 1);
			$order->addProduct($item);
			$price = $item->getPrice();
			if($promotion = $item->getCurrentPromotion()){
				$discount = true;
				$price = $price - ($promotion->getPercentage() * $price / 100 );
			}
			$totalPrice += $price;
		}
		$order->setUser($user);
		$order->setDate(new \DateTime("now"));
		$order->setTotalPrice($totalPrice);
		$user->addOrder($order);
		
		$cart->emptyCart();
		$this->em->persist($order);
		$this->em->flush();
		
		
		return $this->render ( 'CSCartBundle:Checkout:summary.html.twig', array (
				'order' => $order,
				'discounr' => $discount
		));
	}
	
	public function viewOrdersAction(){
		$user = $this->getConnectedUser();
		return $this->render ( 'CSCartBundle:Order:my_orders.html.twig',
			array('user' => $user)
		);
	}

}