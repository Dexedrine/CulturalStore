<?php
namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase{
	
	private $em;
	
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		
		$this->em = static::$kernel->getContainer()->get('sylius.repository.product');	
		$this->manager = static::$kernel->getContainer()->get('sylius.manager.product');
	}
	
	public function testCreateBook() {
		$client = static::createClient();
		
		$crawler = $client->request('GET', '/products/new/book');
		
		$form = $crawler->selectButton('form_create')->form();
		
		// set some values
		$form['form[name]']  = "test";
		$form['form[description]']  = "test";
		$form['form[price]']   = 10;
		$form['form[image]']  = "test";
		$form['form[genre]']  = "test";
		$form['form[langue]']  = "test";
		$form['form[type]']  = "test";
		$form['form[format]']  = "test";
		$form['form[auteur]']  = "test";		
		
		// submit the form
		$crawler = $client->submit($form);
		
		$products = $this->em->findBy(array('name' => "test"));		
		
		$this->assertCount(1,$products);
		$this->assertEquals($products[0]->getPropertyByName("price"), "10");
	}
	
	public function testCreateVideo() {
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/products/new/video');
	
		$form = $crawler->selectButton('form_create')->form();
	
		// set some values
		$form['form[name]']  = "test";
		$form['form[description]']  = "test";
		$form['form[price]']   = 10;
		$form['form[image]']  = "test";
		$form['form[genre]']  = "test";
		$form['form[type]']  = "test";
		$form['form[duree]']  = 120;
		$form['form[format]']  = "test";
		$form['form[langue]']  = "test";
		$form['form[sublangue]']  = "test";
			
		// submit the form
		$crawler = $client->submit($form);
	
		$products = $this->em->findBy(array('name' => "test"));	
	
		$this->assertCount(1,$products);
		$this->assertEquals($products[0]->getPropertyByName("price"), "10");
	}
	
	public function testCreateMusic() {
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/products/new/music');
	
		$form = $crawler->selectButton('form_create')->form();
	
		// set some values
		$form['form[name]']  = "test";
		$form['form[description]']  = "test";
		$form['form[price]']   = 10;
		$form['form[image]']  = "test";
		$form['form[genre]']  = "test";
		$form['form[duree]']  = 60;
		$form['form[nbPistes]']  = 12;
		$form['form[artiste]']  = "test";
		$form['form[format]']  = "test";	
	
		// submit the form
		$crawler = $client->submit($form);
	
		$products = $this->em->findBy(array('name' => "test"));	
	
		$this->assertCount(1,$products);
		$this->assertEquals($products[0]->getPropertyByName("price"), "10");
	}
	
	public function testCreateTicket() {
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/products/new/ticket');
	
		$form = $crawler->selectButton('form_create')->form();
	
		// set some values
		$form['form[name]']  = "test";
		$form['form[description]']  = "test";
		$form['form[price]']   = 10;
		$form['form[type]']  = "test";
		$form['form[image]']  = "test";
		$form['form[genre]']  = "test";
		$form['form[quantite]']  = 1000;
		$form['form[lieu]']  = "test";
		$form['form[dateEvent]']  = "test";
		
		// submit the form
		$crawler = $client->submit($form);
	
		$products = $this->em->findBy(array('name' => "test"));
		
		$this->assertCount(1,$products);
		$this->assertEquals($products[0]->getPropertyByName("price"), "10");
	}
	
	public function testCreateGame() {
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/products/new/game');
	
		$form = $crawler->selectButton('form_create')->form();
	
		// set some values
		$form['form[name]']  = "test";
		$form['form[description]']  = "test";
		$form['form[price]']   = 10;
		$form['form[image]']  = "test";
		$form['form[genre]']  = "test";
		$form['form[plateforme]']  = "test";
		$form['form[PEGI]']  = "test";
		
		// submit the form
		$crawler = $client->submit($form);
	
		$products = $this->em->findBy(array('name' => "test"));
		
		$this->assertCount(1,$products);
		$this->assertEquals($products[0]->getPropertyByName("price"), "10");
	}
	
	public function tearDown() {
		$product = $this->em->findOneBy(array('name' => "test"));
		$this->manager->remove( $product );
		
		$this->manager->flush(); // Save changes in database.
	}
}