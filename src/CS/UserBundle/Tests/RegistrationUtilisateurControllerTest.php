<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;
use CS\UserBundle\Entity\Utilisateur;

class RegistrationUtilisateurControllerTest extends WebTestCase {
	private static  $em;
	private static $user;
	private static $userManager;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		$discriminator = static::$kernel->getContainer ()->get('pugx_user.manager.user_discriminator');
		$discriminator->setClass('CS\UserBundle\Entity\Utilisateur');
		
		self::$userManager = static::$kernel->getContainer ()->get('pugx_user_manager');
		
		
		
		self::$user = new Utilisateur();
		self::$user->setEmail("test@test.fr");
		self::$user->setNom("test");
		self::$user->setPrenom("test");
		self::$user->setPlainPassword("test");
		self::$user->setOptinDonnee(true);
		self::$user->setOptinNewsletter(false);
		
		
	}
	
	public static  function tearDownAfterClass() {
		$user = self::$userManager->findUserBy ( array (
				'username' => self::$user->getUsername()
		) );
		if($user){
			self::$userManager->deleteUser($user);
		}
	}
	
	
	public function testRegister() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/utilisateur' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
		$form ['cs_utilisateur_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_utilisateur_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_utilisateur_registration_form[plainPassword][second]'] = self::$user->getPlainPassword();
		$form ['cs_utilisateur_registration_form[nom]'] = self::$user->getNom();
		$form ['cs_utilisateur_registration_form[prenom]'] = self::$user->getPrenom();
		$form ['cs_utilisateur_registration_form[optin_donnee]'] = self::$user->getOptinDonnee();
		$form ['cs_utilisateur_registration_form[optin_newsletter]'] = self::$user->getOptinNewsletter();
		
		// submit the form
		$crawler = $client->submit ( $form );
		
		$user = self::$userManager->findUserBy  ( array (
				'username' => self::$user->getUsername () 
		) );
		
		$this->assertEquals ( $user->getUsername (), "test@test.fr" );
	}
	
	public function testWrongCreate() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/utilisateur' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
		$form ['cs_utilisateur_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_utilisateur_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_utilisateur_registration_form[plainPassword][second]'] = "toto";
		$form ['cs_utilisateur_registration_form[nom]'] = self::$user->getNom();
		$form ['cs_utilisateur_registration_form[prenom]'] = self::$user->getPrenom();
		$form ['cs_utilisateur_registration_form[optin_donnee]'] = self::$user->getOptinDonnee();
		$form ['cs_utilisateur_registration_form[optin_newsletter]'] = self::$user->getOptinNewsletter();
		
		// submit the form
		$crawler = $client->submit ( $form );
	}
}