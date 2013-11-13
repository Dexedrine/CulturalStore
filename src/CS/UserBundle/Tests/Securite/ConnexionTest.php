<?php
namespace CS\UserBundle\Tests\Securite;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnexionTest extends WebTestCase{
	
	protected $email;
	protected $prenom ;
	protected $nom ;
	protected $motDePasse;
	
	public function setUp() {
	
		$kernel = static::createKernel();
		$this->repo = $kernel->boot();
		$this->repo = $kernel->getContainer();
	
		$userManager = $this->repo->get('fos_user.user_manager');
	
		$this->email = "testing".(string) rand(0,10000)."@test.com";
		$this->prenom = "prenom";
		$this->nom = "nom";
		$this->motDePasse = "passworD1";
	
		$user = $userManager->createUser();
	
		$user->setEmail($this->email);
		$user->setUsername($this->email);
		$user->setPrenom($this->prenom);
		$user->setNom($this->nom);
		$user->setPlainPassword($this->motDePasse);
	
		// Persist the user to the database
		$userManager->updateUser($user);
	
		$this->user = $user;
	
// 		$this->client = static::createClient();
// 		$crawler = $this->client->request('GET', '/');
	
// 		$form = $crawler->selectButton('Login')->form();
	
// 		// set some values
// 		//$un = 'Lucas'.self::newRandomNumber();
// 		$form['_username'] = $un;
// 		$form['_password'] = $pwd;
	
// 		// submit the form
	
// 		$crawler = $this->client->submit($form);
// 		print_r($this->client->getResponse());
	
// 		$this->client->followRedirects();
	
	}
	public function testLogin() {
		$client = static::createClient();
		$crawler = $client->request('GET', '/login');
		$form = $crawler->selectButton('_submit')->form(array(
				'_username'  => $this->email,
				'_password'  => $this->motDePasse,
		));
		$client->submit($form);
	
		$this->assertTrue($client->getResponse()->isRedirect(), 'should be redirected');
		$this->assertTrue($client->getResponse()->isRedirect('http://localhost/'), 'doit etre redirigé vers la page d\'acceuil');
	
		$crawler = $client->followRedirect();
	}
}
