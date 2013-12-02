<?php
namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\ProductBundle\Controller\ProductController;

class ProductControllerTest extends WebTestCase{
	
	private $em;
	
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		$this->em = static::$kernel->getContainer()
		->get('doctrine')
		->getManager()
		;
		
		
		
		
	}
	
	public function testAddProperty() {
		$client = static::createClient();
		$crawler = $client->request('GET', '/product/new/book');
		$form = $crawler->selectButton('_submit')->form(array(
				'form[name]'  => "test",
				'form[description]'  => "test",
				'form[price]'  => 10,
				'form[image]'  => "test",
				'form[genre]'  => "test",
				'form[langue]'  => "test",
				'form[type]'  => "test",
				'form[format]'  => "test",
				'form[auteur]'  => "test",
				
		));
		$client->submit($form);
		
		$products = $this->em 
			->getRepository('CSProductBundle:Product')
			->findOneBy(array('name' => "test"))	
		;
		
		$this->assertCount(1,$products);
		//$this->assertEquals($product->getPropertyByName("price"), 10);
	}
}