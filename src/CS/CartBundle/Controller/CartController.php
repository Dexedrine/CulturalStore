<?php

namespace CS\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CS\CartBundle\Entity\Cart;
use Symfony\Component\Security\Core\SecurityContext;

class CartController extends Controller
{
    public function showCartAction()
    {
    	 
    	$cart = null;
    	$user = $this->get('security.context')->getToken()->getUser();
    	$session = $this->getRequest()->getSession();
    	
    	
    	if($user == "anon."){
    		$cart = $session->get('cart');
    	}
    	else{
    		$cart = $user->getCart();
    	}
    	
        return $this->render('CSCartBundle:Cart:cart.html.twig', 
        			array('user' => $user,
        					'cart' => $cart ) );
    }
    
    
    public function addProductAction($product_id)
    {
    	$session = $this->getRequest()->getSession();
    	
    	$em = $this->getDoctrine()->getManager();
    	$repository_product =  $this->container->get('sylius.repository.product');
    	$product = $repository_product->findOneBy(array('id' => $product_id));
    	
    	$cart = null;
    	$user = $this->get('security.context')->getToken()->getUser();
    	
    	
    	if($user == "anon."){
    		$cart = $session->get('cart');
    		if(!$cart){
    			$cart = new Cart();
    			$session->set('cart',$cart);
    		}
    		$cart->addProduct($product);
    	}
    	else{
    		$cart = $user->getCart();
    		if(!$cart){
    			$cart = new Cart();
    			$user->setCart($cart);
    			$cart->setUser($user);
    			
    			
    		}
    		
    		$cart->addProduct($product);
    		   		
    		$em->flush();
    	}
    	 
    	return $this->render('CSCartBundle:Cart:cart.html.twig',
    			array('user' => $user,
    					'cart' => $cart ) );
    }
}
