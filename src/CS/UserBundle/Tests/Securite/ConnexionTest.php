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
	
		$email = "testing".(string) rand(0,10000)."@test.com";
		$prenom = "prenom";
		$nom = "nom";
		$motDePasse = "passworD1";
	
		$user = $userManager->createUser();
	
		$user->setEmail($email);
		$user->setUsername($email);
		$user->setPrenom($prenom);
		$user->setNom($nom);
		$user->setPlainPassword($motDePasse);
	
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
		$this->client->submit($form);
	
		$this->assertTrue($this->client->getResponse()->isRedirect(), 'should be redirected');
		$this->assertTrue($this->client->getResponse()->isRedirect('http://localhost/'), 'doit etre redirigé vers la page d\'acceuil');
	
		$crawler = $this->client->followRedirect();
	}
}
