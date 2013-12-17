<?php

namespace CS\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use CS\CartBundle\Entity\Cart;
use CS\ProductBundle\Entity\Product;

class UserSessionCartControllerTest extends WebTestCase {
	private static $em;
	private static $repository;
	private static $product_manager;
	private static $userManager;
	private static $client;
	private static $cart;
	private static $user;
	private static $container;
	private static $product;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		self::$client = static::createClient ();
		
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
		
		self::$repository = self::$em->getRepository ( 'CSCartBundle:Cart' );
		
		self::$userManager =static::$kernel->getContainer ()->get('pugx_user_manager');
		self::$product_manager = static::$kernel->getContainer ()->get ( 'sylius.repository.product' );
		
		self::$product = new Product();
		
		self::$product
		->setName("test")
		->setDescription("test")
		->setMetaKeywords("ticket");
		
		self::$em->persist(self::$product);
		
		
		self::$user = self::$userManager->createUser ();
		
		self::$user->setEmail ( "test_cart@test.fr" );
		
		self::$user->setPrenom ( "test" );
		self::$user->setOptinDonnee(true);
		self::$user->setOptinNewsletter(true);
		self::$user->setNom ( "test" );
		self::$user->setPlainPassword ( "test" );
		self::$user->setEnabled ( true );
		self::$cart = new Cart();
		self::$user->setCart(self::$cart);
		// Persist the user to the database
		self::$userManager->updateUser ( self::$user );
		
		self::$em->flush();
		
		
		$session = self::$client->getContainer()->get('session');
		self::$container = self::$client->getContainer();
		$firewall = 'main';
		$token = new UsernamePasswordToken(self::$user, 'test', $firewall, array('ROLE_CLIENT'));
		$session->set('_security_'.$firewall, serialize($token));
		
		$session->save();
		
		/*
		 * self::$cart = new Cart(); self::$user->setCart(self::$cart); self::$cart->setUser(self::$user);
		 */
	}
	public static function tearDownAfterClass() {
		self::$user->setCart(null);
		self::$em->flush ();
		self::$em->remove ( self::$user);
		self::$em->remove ( self::$product);
		self::$em->flush ();
	}
	public function testShowCart() {
		$crawler = self::$client->request ( 'GET', '/cart/' );
	}
	/**
	 * @depends testShowCart
	 */
	public function testAddProduct() {
		$crawler = self::$client->request ( 'GET', '/cart/add_product/' . self::$product->getId () );
		
		$security_contexte = self::$client->getContainer()->get('security.context');
		$user = $security_contexte->getToken()->getUser();
		
		$cart = $user->getCart();
		$products = $cart->getProducts();
		$this->assertCount(1,$products);
		$this->assertEquals(self::$product->getId(),$products[0]->getId());
		
	}
	/**
	 * @depends testAddProduct
	 */
	public function testDeleteProduct() {
		$crawler = self::$client->request ( 'GET', '/cart/delete_product/' . self::$product->getId () );
		
		$security_contexte = self::$client->getContainer()->get('security.context');
		$user = $security_contexte->getToken()->getUser();
		self::$cart = $user->getCart();
		$products = self::$cart->getProducts();
		$this->assertCount(0, $products);
		
	}
	public function testValidateCart() {
		$crawler = self::$client->request ( 'GET', '/cart/validation');
	}
}