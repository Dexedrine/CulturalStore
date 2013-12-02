<?php
namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase{
	
	private $em;
	
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
				
		$this->em = static::$kernel->getContainer()->get('sylius.repository.product');		
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
		
		
		/*$this->assertCount(1,$products);
		//$this->assertEquals($product->getPropertyByName("price"), 10);*/
	}
}