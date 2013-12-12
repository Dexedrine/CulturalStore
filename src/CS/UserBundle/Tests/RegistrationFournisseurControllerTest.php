<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;
use CS\UserBundle\Entity\Utilisateur;
use CS\UserBundle\Entity\Fournisseur;

class RegistrationFournisseurControllerTest extends WebTestCase {
	private static  $em;
	private static $userManager;
	private static $user;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		$discriminator = static::$kernel->getContainer ()->get('pugx_user.manager.user_discriminator');
		$discriminator->setClass('CS\UserBundle\Entity\Fournisseur');
		
		self::$userManager = static::$kernel->getContainer ()->get('pugx_user_manager');
		
		
		self::$user = new Fournisseur();
		self::$user->setEmail("test@test.fr");
		self::$user->setNom("test");
		self::$user->setVille("test");
		self::$user->setCodepostal("test");
		self::$user->setAdresse("test");
		self::$user->setSiret("test");
		self::$user->setPlainPassword("test");
		
		
	}
	
	public static  function tearDownAfterClass() {
		$user = self::$userManager->findUserBy ( array (
				'username' => self::$user->getUsername()
		) );
	
		if($user){
		self::$userManager->deleteUser ( $user );
		}
		
	}
	
	
	public function testRegister() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/fournisseur' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
		$form ['cs_fournisseur_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_fournisseur_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_fournisseur_registration_form[plainPassword][second]'] = self::$user->getPlainPassword();
		$form ['cs_fournisseur_registration_form[nom]'] = self::$user->getNom();
		$form ['cs_fournisseur_registration_form[adresse]'] = self::$user->getAdresse();
		$form ['cs_fournisseur_registration_form[ville]'] = self::$user->getVille();
		$form ['cs_fournisseur_registration_form[codepostal]'] = self::$user->getCodepostal();
		$form ['cs_fournisseur_registration_form[SIRET]'] = self::$user->getSiret();
		
		// submit the form
		$crawler = $client->submit ( $form );
		
		$user = self::$userManager->findUserBy( array (
				'username' => self::$user->getUsername () 
		) );
		
		$this->assertEquals ( $user->getUsername (), "test@test.fr" );
	}
	
	public function testWrongCreate() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/register/fournisseur' );
		
		$form = $crawler->selectButton ( 'registration_submit' )->form ();
		
		// set some values
		$form ['cs_fournisseur_registration_form[email]'] = self::$user->getEmail();
		$form ['cs_fournisseur_registration_form[plainPassword][first]'] = self::$user->getPlainPassword();
		$form ['cs_fournisseur_registration_form[plainPassword][second]'] = "toto";
		$form ['cs_fournisseur_registration_form[nom]'] = self::$user->getNom();
		$form ['cs_fournisseur_registration_form[adresse]'] = self::$user->getAdresse();
		$form ['cs_fournisseur_registration_form[ville]'] = self::$user->getVille();
		$form ['cs_fournisseur_registration_form[codepostal]'] = self::$user->getCodepostal();
		$form ['cs_fournisseur_registration_form[SIRET]'] = self::$user->getSiret();
		
		// submit the form
		$crawler = $client->submit ( $form );
	}
}