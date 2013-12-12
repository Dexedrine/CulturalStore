<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;
use CS\UserBundle\Entity\Utilisateur;
use CS\UserBundle\Entity\Administrateur;

class RegistrationAdminControllerTest extends WebTestCase {
	private static  $em;
	private static $userManager;
	private static $user;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		$discriminator = static::$kernel->getContainer ()->get('pugx_user.manager.user_discriminator');
		$discriminator->setClass('CS\UserBundle\Entity\Administrateur');
		
		self::$userManager = static::$kernel->getContainer ()->get('pugx_user_manager');
		
		
		
		self::$user = new Administrateur();
		self::$user->setEmail("test@test.fr");
		self::$user->setUsername("test");
		self::$user->setPlainPassword("test");
		
		
	}
	
	public static  function tearDownAfterClass() {
		$user = self::$userManager->findUserBy ( array (
				'username' => self::$user->getUsername()
		) );
	
		if($user){
		self::$userManager->deleteUser( $user );
		}
	}
	
	
	public function testRegister() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/admin' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
		$form ['cs_admin_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_admin_registration_form[username]'] = self::$user->getUsername();
		$form ['cs_admin_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_admin_registration_form[plainPassword][second]'] = self::$user->getPlainPassword();
		
		
		// submit the form
		$crawler = $client->submit ( $form );
		
		$user = self::$userManager->findUserBy ( array (
				'username' => self::$user->getUsername () 
		) );
		
		$this->assertEquals ( $user->getUsername (), "test" );
	}
	
	public function testWrongCreate() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/admin' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
			$form ['cs_admin_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_admin_registration_form[username]'] = self::$user->getUserName();
		$form ['cs_admin_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_admin_registration_form[plainPassword][second]'] = self::$user->getPlainPassword();
		
		// submit the form
		$crawler = $client->submit ( $form );
	}
}