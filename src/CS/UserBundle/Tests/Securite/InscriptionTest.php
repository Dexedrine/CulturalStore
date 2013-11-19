<?php
namespace CS\UserBundle\Tests\Securite;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionTest extends WebTestCase{
	
	protected $email;
	protected $prenom ;
	protected $nom ;
	protected $motDePasse;
	
	public function setUp() {
	
		$this->email = "testing".(string) rand(0,10000)."@test.com";
		$this->prenom = "prenom";
		$this->nom = "nom";
		$this->motDePasse = "passworD1";
	
		
		$client = static::createClient();
		$crawler = $client->request('GET', '/register');
		$form = $crawler->selectButton('_submit')->form(array(
				'fos_user_registration_form[email]'  => $this->email,
				'fos_user_registration_form[plainPassword][first]'  => $this->motDePasse,
				'fos_user_registration_form[plainPassword][second]'  => $this->motDePasse,
				'fos_user_registration_form[nom]'  => $this->nom,
				'fos_user_registration_form[prenom]'  => $this->prenom,
		));
		$client->submit($form);
		
		
	
	}
	public function testNom() {

	}
}
