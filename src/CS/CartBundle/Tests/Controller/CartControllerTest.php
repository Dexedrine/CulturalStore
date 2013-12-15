<?php

namespace CS\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use CS\CartBundle\Entity\Cart;

class CartControllerTest extends WebTestCase
{
	private static $em;
	private static $repository;
	private static $product_manager;
	private static $user;
	private static $userManager;
	private static $client;
	private static $cart;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		self::$client = static::createClient();
			
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
				
		self::$repository = self::$em->getRepository ( 'CSCartBundle:Cart' );
		self::$userManager =static::$kernel->getContainer ()->get('pugx_user_manager');		
		self::$product_manager = static::$kernel->getContainer ()->get ( 'sylius.repository.product' );
		
		self::$user = self::$userManager->createUser ();		
		self::$user->setEmail ( "test@test.fr" );		
		self::$user->setPrenom ( "test" );
		self::$user->setOptinDonnee(true);
		self::$user->setOptinNewsletter(true);
		self::$user->setNom ( "test" );
		self::$user->setPlainPassword ( "test" );
		self::$user->setEnabled ( true );
		// Persist the user to the database
		self::$userManager->updateUser ( self::$user );	

		self::$em->flush();
		
		$session = self::$client->getContainer()->get('session');		
		$firewall = 'main';
		$token = new UsernamePasswordToken(self::$user, 'test', $firewall, array('ROLE_CLIENT'));
		$session->set('_security_'.$firewall, serialize($token));
	
		$session->save();
		
		self::$cart = new Cart();
	}
	
	public static  function tearDownAfterClass() {
		self::$em->remove ( self::$user );
		self::$em->flush ();
	}
	
    public function testShowCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cart/');        
    }
    
    public function testAddProduct(){
    	
    }
    
    public function testDeleteProduct(){
    	
    }
    
}
