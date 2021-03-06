<?php

namespace CS\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CartBundle\Entity\Cart;
use CS\ProductBundle\Entity\Product;

class CartControllerTest extends WebTestCase {
	private static $em;
	private static $repository;
	private static $product_manager;
	private static $client;
	private static $cart;
	private static $product;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		self::$client = static::createClient ();
		
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
		
		self::$repository = self::$em->getRepository ( 'CSCartBundle:Cart' );
		
		self::$product_manager = static::$kernel->getContainer ()->get ( 'sylius.repository.product' );
		
		self::$product = new Product();
		
		self::$product
		->setName("test")
		->setDescription("test")
		->setMetaKeywords("ticket");
		
		self::$em->persist(self::$product);
		self::$em->flush();
		
		self::$em->flush ();
		
		
		/*
		 * self::$cart = new Cart(); self::$user->setCart(self::$cart); self::$cart->setUser(self::$user);
		 */
	}
	public static function tearDownAfterClass() {
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
			
		$session = self::$client->getContainer()->get('session');
		self::$cart = $session->get('cart');
		$products = self::$cart->getProducts();
		$this->assertCount(1,$products);
		$this->assertEquals(self::$product->getId(),$products[0]->getId());
		
	}
	/**
	 * @depends testAddProduct
	 */
	public function testDeleteProduct() {
		$crawler = self::$client->request ( 'GET', '/cart/delete_product/' . self::$product->getId () );
		
		$session = self::$client->getContainer()->get('session');
		self::$cart = $session->get('cart');
		$products = self::$cart->getProducts();
		$this->assertCount(0, $products);
		
	}
	public function testValidateCart() {
		$crawler = self::$client->request ( 'GET', '/cart/validation');
		
		$session = self::$client->getContainer()->get('session');
		$messages = $session->getFlashBag()->get('notice');
		
		$this->assertCount(1,$messages);
	}
}