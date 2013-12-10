<?php

namespace CS\UserBundle\Tests\Securite;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnexionTest extends WebTestCase {
	protected $email;
	protected $prenom;
	protected $nom;
	protected $motDePasse;
	protected $userManager;
	public function setUp() {
		$kernel = static::createKernel ();
		$this->repo = $kernel->boot ();
		$this->repo = $kernel->getContainer ();
		
		$this->userManager = $this->repo->get ( 'fos_user.user_manager' );
		
		$this->email = "testing" . ( string ) rand ( 0, 10000 ) . "@test.com";
		$this->prenom = "prenom";
		$this->nom = "nom";
		$this->motDePasse = "passworD1";
		
		$user = $this->userManager->createUser ();
		
		$user->setEmail ( $this->email );
		$user->setUsername ( $this->email );
		$user->setPrenom ( $this->prenom );
		$user->setNom ( $this->nom );
		$user->setPlainPassword ( $this->motDePasse );
		$user->setEnabled ( true );
		// Persist the user to the database
		$this->userManager->updateUser ( $user );
		
		$this->user = $user;
		
		// $this->client = static::createClient();
		// $crawler = $this->client->request('GET', '/');
		
		// $form = $crawler->selectButton('Login')->form();
		
		// // set some values
		// //$un = 'Lucas'.self::newRandomNumber();
		// $form['_username'] = $un;
		// $form['_password'] = $pwd;
		
		// // submit the form
		
		// $crawler = $this->client->submit($form);
		// print_r($this->client->getResponse());
		
		// $this->client->followRedirects();
	}
	/*
	public function testLogin() {
		$client = static::createClient ();
		$crawler = $client->request ( 'GET', $this->generateUrl ( $client, 'cs_design_homepage' ) );
		$form = $crawler->selectButton ( '_submit' )->form ( array (
				'_username' => $this->email,
				'_password' => $this->motDePasse 
		) );
		$client->submit ( $form );
		echo '##################';
		$userType = $client->getContainer ()->get ( 'fos_elastica.index.website.user' );
		echo phpinfo ();
		echo $userType->search ( 'bob' );
		echo $this->generateUrl ( $client, 'cs_design_homepage' );
		echo '##################';
		// $this->assertTrue($client->getResponse()->isRedirect(), 'should be redirected');
		// echo $this->generateUrl($client,'cs_design_homepage')&'login' ;
		$this->assertTrue ( $client->getResponse ()->isRedirect ( $this->generateUrl ( $client, 'cs_design_homepage' ) ) );
		// $this->assertTrue($client->getResponse()->isRedirect('/'), 'doit etre redirigé vers la page d\'acceuil');
		
		// $crawler = $client->followRedirect();
	}*/
	public function generateUrl($client, $route, $parameters = array()) {
		return $client->getContainer ()->get ( 'router' )->generate ( $route, $parameters, true );
	}
	
	public function testRecuperationDeLUtilisateurDepuisLaBase() {
		$user = $this->userManager->findUserByEmail ( $this->email );
		$this->assertEquals ( $this->email, $user->getEmail () );
		$this->assertEquals ( $this->email, $user->getUsername () );
		$this->assertEquals ( $this->prenom, $user->getPrenom () );
		$this->assertEquals ( $this->nom, $user->getNom () );
	}
	
	public function testLogin() {
		$client = static::createClient ();
		$crawler = $client->request ( 'GET', '/login' );
		$form = $crawler->selectButton ( '_submit' )->form ( array (
				'_username' => $this->email,
				'_password' => $this->motDePasse 
		) );
		$client->submit ( $form );
		// echo $this->client->getResponse()->getContent();
		$this->assertTrue ( $client->getResponse ()->isRedirect (), 'should be redirected' );
		/*
		 * $this->assertTrue( $client->getResponse()->isRedirect('/') );
		 */
		// $this->assertTrue($client->getResponse()->isRedirect('/'), 'doit etre redirigé vers la page d\'acceuil');
		
		// $crawler = $client->followRedirect();
	}
	/**
	 * supprime l'utlisateur apres le test
	 */
	public function tearDown() {
		$user = $this->userManager->findUserByEmail ( $this->email );
		$this->userManager->deleteUser ( $user );
	}
}

